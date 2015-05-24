<?php
class System_helper
{
    public static function set_system_message($message,$message_type=0)
    {
        /*
         * $message_type=0 error
         * 1=success
         * 2=info
         */
        $CI =& get_instance();
        $CI->session->set_userdata("system_message",array("message_type"=>$message_type,"message"=>$message));
    }
    public static function get_system_message()
    {
        $CI =& get_instance();
        $message=$CI->session->userdata("system_message");
        if($message)
        {
            $message_html=System_helper::get_system_message_string($message);
            $CI->session->set_userdata("system_message","");
            return $message_html;
        }
        else
        {
            return "";
        }

    }
    public static function get_system_message_string($message)
    {
//        $html="<div class='alert ";
//        if($message['message_type']==0)
//        {
//            $html.="alert-danger";
//        }
//        else if($message['message_type']==1)
//        {
//            $html.="alert-success";
//        }
//        else if($message['message_type']==2)
//        {
//            $html.="alert-info";
//        }
//        $html.="'><a class='close'>&times;</a>".$message['message']."</div>";
        return $message['message'];
    }

    public static function pagination_config($base_url, $total_rows, $segment)
    {
        $CI =& get_instance();

        $config["base_url"] = $base_url;
        $config["total_rows"] = $total_rows;
        $config["per_page"] = $CI->config->item('view_per_page');
        $config['num_links'] = $CI->config->item('links_per_page');
        $config['use_page_numbers'] = true;
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['uri_segment'] = $segment;
        return $config;
    }



    public static function file_upload($post_file_name,$save_dir,$fileName,$filetype,$filesize)
    {
        $CI = & get_instance();
        $ext = explode("/", @$_FILES[$post_file_name]['type']);
        $size = @$_FILES[$post_file_name]['size'];


        if($ext['0'] !='')
        {

            if($ext['0'] == $filetype)
            {

                if($size < $filesize)
                {

                    $CI->load->library('upload');

                    $config['upload_path'] = $save_dir;
                    $config['allowed_types'] = $CI->config->item('user_profile_img_allowed_types');
                    $config['max_size'] = $filesize;
                    $config['file_name'] = $fileName;
                    $CI->load->library('upload', $config);

                    foreach ($_FILES as $key => $value) {
                        $CI->upload->initialize($config);
                        if (!$CI->upload->do_upload($key)) {

                            $errors[] = $CI->upload->display_errors();
                            System_helper::set_system_message($CI->lang->line("IMG_ERROR"),0);
                            redirect(uri_string());
                        }
                        else
                        {
                            $temp = array('upload_data' => $CI->upload->data());
                            $info = $CI->upload->data();
                            return $fileName;
                        }
                    }
                }
                else
                {
                    System_helper::set_system_message($CI->lang->line("IMG_SIZE_ERROR"),0);
                    redirect(uri_string());
                }
            }
            else
            {
                System_helper::set_system_message($CI->lang->line("IMG_TYPE_ERROR"),0);
                redirect(uri_string());
            }
        }
        else
        {
            return '';
        }
    }



    public static function Get_Eng_to_Bng($str = NULL) {
        $engNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, '');
        $bangNumber = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', '');
        $converted = str_replace($engNumber, $bangNumber, $str);
        return $converted;
    }


    public static function Get_Bng_to_Eng($str = NULL) {
        $engNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, '');
        $bangNumber = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', '');
        $converted = str_replace($bangNumber, $engNumber, $str);
        return $converted;
    }

    public static function calculate_percentage($total,$rate)
    {
        $cal = ($rate / 100) * $total;
        return $cal;
    }

    public static function  get_detailHeadName($detailHeadCode)
    {
        $CI =& get_instance();
        $CI->db->select('cad.*');
        $CI->db->from('chartofaccountdetailhead cad');
        $CI->db->where('DetailHeadCode',$detailHeadCode);

        $result = $CI->db->get()->row_array();

        if($result)
        {
            return $result['DetailHeadName'];
        }
        else
        {
            return null;
        }
    }

    public static function get_fiscal_year_month_min_max_date()
    {

        $user = User_helper::get_user();
        $current_month = $user->current_month;
        $fiscal_year = $user->fiscal_year;


        $start_year = substr($fiscal_year,0,4);
        $end_year = substr($fiscal_year,-4);

        $year = ($current_month<=6)?$end_year:$start_year;

        $starts = '01';
        $ends = cal_days_in_month(CAL_GREGORIAN, $current_month, $year);

        if(($current_month)<10)
        {
            $current_month = '0'.$current_month;
        }
        return array("max_date"=>$year.$current_month.$ends,"min_date"=>$year.$current_month.$starts);
    }

    public static function getTime_Zone()
    {
        date_default_timezone_set('Asia/Dhaka');

        return $ctime = time();
    }

    public static function convert_date($date='', $type='')
    {

//        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
//        echo $dt->format('F j, Y, g:i a');

        date_default_timezone_set('Asia/Dhaka');
        $strtodate=strtotime($date);

        if(!empty($date) && $type=="OnlyDate")
        {
            $convert_date = date('d-m-Y', $strtodate);
        }
        elseif(!empty($date) && $type=="OnlyTime")
        {
            $convert_date = date('H:i:s', $strtodate);
        }
        elseif(!empty($date) && $type=="DateTime")
        {
            $convert_date = date('d-m-Y H:i:s', $strtodate);
        }
        elseif(!empty($date) && $type=="SqlDate")
        {
            $convert_date = date('Y-m-d', $strtodate);
        }
        elseif(!empty($date) && $type=="SqlTime")
        {
            $convert_date = date('H:i:s', $strtodate);
        }
        elseif(!empty($date) && $type=="SqlDateTime")
        {
            $convert_date = date('Y-m-d H:i:s', $strtodate);
        }
        elseif(!empty($date) && $type=="ViewDate")
        {
            $convert_date = date('d M Y');
        }
        elseif(!empty($date) && $type=="CurrentDate")
        {
            $convert_date = date('d-m-Y');
        }
        elseif(!empty($date) && $type=="CurrentTime")
        {
            $convert_date = date('H:i:s');
        }
        elseif(!empty($date) && $type=="CurrentDateTime")
        {
            $convert_date = date('d-m-Y H:i:s');
        }
        elseif(!empty($date) && $type=="CurrentSqlDate")
        {
            $convert_date = date('Y-m-d');
        }
        elseif(!empty($date) && $type=="CurrentSqlTime")
        {
            $convert_date = date('H:i:s');
        }
        elseif(!empty($date) && $type=="CurrentSqlDateTime")
        {
            $convert_date = date('Y-m-d H:i:s');
        }
        else
        {
            $convert_date='';
        }

        return $convert_date;
    }

    public static function date_to_fiscal_year($date="")
    {
        date_default_timezone_set('Asia/Dhaka');
        $strtodate=strtotime($date);
        if($strtodate)
        {
            $convert_date = date('d-m-Y', $strtodate);
            $edate=explode('-', $convert_date);
            if($edate['1']>=1 && $edate['1']<=6)
            {
                $byear=$edate['2']-1;
                $cyear=$edate['2'];
                $fiscal_year=$byear."-".$cyear;
            }
            else
            {
                $ayear=$edate['2']+1;
                $cyear=$edate['2'];
                $fiscal_year=$cyear."-".$ayear;
            }
            return $fiscal_year;
        }
        else
        {
            return false;
        }
    }
    public static function get_pdf($html)
    {
        include(FCPATH."mpdf/mpdf.php");
        $mpdf=new mPDF();
        $mpdf->useAdobeCJK=true;
        $mpdf->SetAutoFont(AUTOFONT_ALL);
        $mpdf->WriteHTML(file_get_contents(base_url().'fonts/mpdf.css'),1);
        $mpdf->WriteHTML($html);
        $mpdf->Output();

    }

}