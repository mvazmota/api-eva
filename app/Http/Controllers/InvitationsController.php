<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;
use Validator;
use App\Invitation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class InvitationsController extends Controller
{

    public static function forge()
    {
        $newClass = __CLASS__;
        return new $newClass();
    }

    public function generate(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'email' => 'required',
            'family_id' => 'required',
            'created_by' => 'required',
        ],
            [
                'email' => 'The email field is required',
                'family_id' => 'The family_id field is required',
                'created_by' => 'The created_by field is required',
            ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();

            return $this->_result($errors, 400, 'NOK');
        }

        $expire = "5 day";
        $email = $data['email'];
        $active = True;

        // Check if email has invitation
        if($this->checkEmail($email))
        {
            $now = strtotime("now");
            $format = 'Y-m-d H:i:s ';
            $expiration = date($format, strtotime('+ '.$expire, $now));
            $code = Str::random(8) . $this->hash_split(hash('sha256',$email)) . $this->hash_split(hash('sha256',time())) . Str::random(8);
            $newInvi = array(
                "code"			=> $code,
                "email"			=> $email,
                "expiration"	=> $expiration,
                "active"		=> $active,
                "used"			=> "0",
                "family_id"     => $data['family_id'],
                "created_by"     => $data['created_by']
            );
            Invitation::create($newInvi);
            return json_encode($newInvi);
        }
        else
        {
            return json_encode(array(
                "error" =>	"This email address has an invitation."
            ));
        }

    }

    public function unexpire($code,$email,$expire)
    {
        $now = strtotime("now");
        $format = 'Y-m-d H:i:s ';
        $expiration = date($format, strtotime('+ '.$expire, $now));
        Invitation::where('code','=',$code)->where('email','=',$email)
            ->update(array('expiration'=>$expiration));
    }

    public function active($code,$email)
    {
        Invitation::where('code','=',$code)->where('email','=',$email)
            ->update(array('active'=>True));
    }

    public function deactive($code,$email)
    {
        Invitation::where('code','=',$code)->where('email','=',$email)->update(array('active'=>False));
    }

    public function used($code,$email)
    {
        Invitation::where('code','=',$code)->where('email','=',$email)
            ->update(array('used'=>True));
    }

    public function unuse($code,$email)
    {
        Invitation::where('code','=',$code)->where('email','=',$email)
            ->update(array('used'=>False));
    }

    public function status($code,$email)
    {
        $temp = Invitation::where('code', '=', $code)->where('email','=',$email)
            ->first();
        if($temp)
        {
            if(!$temp->active)
                return "deactive";
            else if($temp->used)
                return "used";
            else if(strtotime("now") > strtotime($temp->expiration))
                return "expired";
            else
                return "valid";
        }
        else
            return "not exist";
    }

    public function check($code,$email)
    {
        $temp = Invitation::where('code', '=', $code)->where('email','=',$email)
            ->first();
        if($temp)
        {
            if(!$temp->active or $temp->used or strtotime("now") > strtotime($temp->expiration))
                return False;
            else
                return True;
        }
        else
            return False;
    }

    public function delete($code,$email)
    {
        $temp = Invitation::where('code', '=', $code)->where('email','=',$email)
            ->delete();
    }

    public function emailStatus($email)
    {
        $temp = Invitation::where('email','=',$email)
            ->first();
        if($temp)
        {
            $expired = false;
            if(strtotime("now") > strtotime($temp->expiration))
                $expired = true;
            $invite = array(
                "code"			=> $temp->code,
                "email"			=> $temp->email,
                "expiration"	=> $temp->expiration,
                "expired"		=> $expired,
                "active"		=> $temp->active,
                "used"			=> $temp->used
            );
            return json_encode($invite);
        }
        else
            return False;
    }

    protected function checkEmail($email)
    {
        $temp = Invitation::where('email', '=', $email)->first();
        if($temp)
            return False;
        else
            return True;
    }

    protected function hash_split($hash)
    {
        $output = str_split($hash,8);
        return $output[rand(0,1)];
    }
}
