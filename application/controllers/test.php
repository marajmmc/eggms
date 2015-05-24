<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct()
    {
        parent::__construct();

//        $this->load->database();

    }

    public function index()
    {
        $data['head']="This is my first page";
        $this->load->view('test', $data);
    }

    public function add_edit($id = 0) {

    }
    public function generateImage()
    {

        header("Content-Type: image/png");
        $im = @imagecreate(110, 40)
            or die("Cannot Initialize new GD image stream");
        $background_color = imagecolorallocate($im, 255, 255, 255);
        $text_color = imagecolorallocate($im, 255, 0, 0);
        $word=$this->generate_word();
        $this->session->set_userdata("captacha",$word);
        imagestring($im, 5, 10, 13,$word  , $text_color);
        imagepng($im);
        imagedestroy($im);

    }
    public function generateImage2()
    {


// Set the content-type
header('Content-Type: image/png');

// Create the image
$im = imagecreatetruecolor(120, 40);

// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 120, 40, $white);

// The text to draw
$text = $this->generate_word();
// Replace path by your own font path
$font = FCPATH.'/fonts/arial.ttf';

// Add some shadow to the text
imagettftext($im, 20, 0, 11, 31, $grey, $font, $text);

// Add the text
imagettftext($im, 20, 0, 10, 30, $black, $font, $text);

// Using imagepng() results in clearer text compared with imagejpeg()
imagepng($im);
imagedestroy($im);


    }
    private function generate_word($length = 6) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);

        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }









}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */