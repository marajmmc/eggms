<?php

class Validation_helper
{
    public static function is_numeric($str)
    {
        if(is_numeric($str))
        {
           return true;
        }
        else
        {
            return false;
        }
    }

    public static function is_empty($str)
    {
       if(strlen($str)<1)
       {
           return false;
       }
       else
       {
           return true;
       }
    }

    public static function is_valid_email($str)
    {
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$str))
        {
            return false;
        }
        else
        {
            return false;
        }
    }
    public static function check_date_in_user_fiscal_year_month($date)
    {
        $user=User_helper::get_user();
        $voucherDate=strtotime($date);
        if(!$voucherDate)
        {
            return false;
        }
        else
        {

            $month=date("m",$voucherDate);
            if($month!=$user->current_month)
            {
                return false;
            }
            else
            {
                $year=date("Y",$voucherDate);
                if($month>6)
                {
                    if($year!=substr($user->fiscal_year,0,4))
                    {
                        return false;
                    }
                }
                else
                {
                    if($year!=substr($user->fiscal_year,-4))
                    {
                        return false;
                    }
                }

            }
        }
        return true;

    }


}