<?php
session_start();               //Ϊ�˽���֤���ֵ������$_SESSION��
class ValidationCode {
 private $width;
 private $height;
 private $codeNum;           //��֤��ĸ���
 private $image;             //ͼ����Դ
 private $checkCode;         //��֤���ַ���

 function __construct($width=60,$height=20,$codeNum=4) {
  $this->width=$width;
  $this->height=$height;
  $this->codeNum=$codeNum;
  $this->checkCode=$this->createCheckCode();
 }
 //ͨ�����ø÷���������������֤��ͼ��
 function showImage() {
  $this->createImage();      //��һ������������ͼ��
  $this->setDisturbColor();  //�ڶ��������ø���Ԫ�أ��˴�ֻ���˸���ֱ��
  $this->outputText();       //�������������֤��
  $this->outputImage();      //���Ĳ������ͼ��
 }
 //ͨ�����ø÷�����ȡ�����������֤���ַ���
 function getCheckCode(){
  return $this->checkCode;
 }
 //��������ͼ��
 private function createImage(){
  $this->image=imagecreatetruecolor($this->width, $this->height);
  //�������ɫ
  $backColor=imagecolorallocate($this->image, rand(225,255), rand(225,255), rand(225,255));
  //Ϊ���������ɫ
  imagefill($this->image, 0, 0, $backColor);
  //���ñ߿���ɫ
  $border=imagecolorallocate($this->image, 0, 0, 0);
  //�������α߿�
  imagerectangle($this->image, 0, 0, $this->width-1, $this->height-1, $border); 
 }
 //�������Ԫ��
 private function setDisturbColor() {
  $lineNum=rand(2,4);               //���ø���������
  for($i=0;$i<$lineNum;$i++) {
   $x1=rand(0,$this->width/2);
   $y1=rand(0,$this->height/2);
   $x2=rand($this->width/2,$this->width);
   $y2=rand($this->height/2,$this->height);
   $color=imagecolorallocate($this->image, rand(100,200), rand(100,200), rand(100,200));   //��ɫ���ñȱ����������ǳ
   imageline($this->image, $x1, $y1, $x2, $y2, $color);
  }
 }
 //������֤���ַ���
 private function createCheckCode() {    //�����������ͨ��ǰ̨���ݹ����Ĳ��������ַ�
  $code="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $string="";
  for($i=0;$i<$this->codeNum;$i++) {
   $char=$code{rand(0,strlen($code)-1)};
   $string.=$char;
  }
  return $string;
 }
 //�����֤��
 private function outputText() {
  //echo "<script type='text/javascript'>alert('".$this->checkCode."')</script>";
  $string=$this->checkCode;
  for($i=0;$i<$this->codeNum;$i++) {
   $x=rand(1,4)+$this->width*$i/$this->codeNum;
   $y=rand(1,$this->height/4);
   $color=imagecolorallocate($this->image, rand(0,128), rand(0,128), rand(0,128));
   $fontSize=rand(4,5);
   imagestring($this->image, $fontSize, $x, $y, $string[$i], $color);
  } 
 }
 //���ͼ��
 private function outputImage() {
  if(imagetypes() & IMG_GIF) {
   header("Content-type:image/gif");
   imagepng($this->image);
  }else if(imagetypes() & IMG_JPG) {
   header("Content-type:image/jpeg");
   imagepng($this->image);
  }else if(imagetypes() & IMG_PNG) {
   header("Content-type:image/png");
   imagepng($this->image);
  }else if(imagetypes() & IMG_WBMP) {
   header("Content-type:image/vnd.wap.wbmp");
   imagepng($this->image);
  }else {
   die("PHP��֧��ͼ�񴴽�");
  }
 }
 function __destruct() {
  imagedestroy($this->image);
 }
}
$code=new ValidationCode(60, 20, 4);
$_SESSION['checkCode']=$code->getCheckCode();     //����֤���ֵ����session���Ա���ҳ���е�����֤
$code->showImage();   //�����֤��
?>