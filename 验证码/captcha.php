<?php
/**
 * ��ȫ��֤�� 
 * ��ȫ����֤��Ҫ����֤������Ť������ת��ʹ�ò�ͬ���壬��Ӹ�����
 */
class captcha {
	/**
	 * ��֤���session���±�
	 * 
	 * @var string
	 */
	public static $seKey = 'captcha';
	public static $expire = 300;     // ��֤�����ʱ�䣨s��
	/**
	 * ��֤����ʹ�õ��ַ���01IO���׻��������鲻��
	 *
	 * @var string
	 */
	public static $codeSet = '��һ�����˲����д�����������Ϊ�ǵظ��ù�ʱҪ���������ҵ�����������������ѧ�¼�������巢�ɲ���ɳ��ܷ���ͬ����˵�ֹ����ȸ�����Ӻ������С��Ҳ�����߱������������ʵ�Ҷ������ˮ������������������ʮս��ũʹ��ǰ�ȷ���϶�·ͼ�ѽ�������¿���֮��ӵ���Щ�������¶�����Ӧ�����������ɶ����ص�������˼�����ȥ�����������ѹԱ��ҵ��ȫ�������ڵ�ƽ��������ëȻ�ʱ�չ�������û���������ϵ������Ⱥͷ��ֻ���ĵ����ϴ���ͨ�����Ͽ��ֹ�����������ϯλ����������ԭ�ͷ�������ָ��������ںܽ̾��ش˳�ʯǿ�������Ѹ���ֱ��ͳʽת�����о���ȡ������������־�۵���ôɽ�̰ٱ��������汣��ί�ָĹܴ�������֧ʶ�������Ϲ�רʲ���;�ʾ������ÿ�����������Ϲ����ֿƱ�������Ƹ��������������༯������װ����֪���е�ɫ����ٷ�ʷ����������֯�������󴫿ڶϿ��ɾ����Ʒ�вβ�ֹ��������ȷ������״��������Ŀ����Ȩ�Ҷ����֤��Խ�ʰ��Թ�˹��ע�첼�����������ر��̳�������ǧʤϸӰ�ð׸�Ч���ƿ��䵶Ҷ������ѡ���»������ʼƬʩ���ջ�������������ҩ����Ѵ��ʿ���Һ��׼��ǽ�ά�������������״����ƶ˸������ش幹���ݷǸ���ĥ�������ʽ���ֵ��̬���ױ�������������̨���û������ܺ���ݺ����ʼ��������Ͼ��ݼ���ҳ�����Կ�Ӣ��ƻ���Լ�Ͳ�ʡ���������ӵ۽�����ֲ������������ץ���縱����̸Χʳ��Դ�������ȴ����̻����������׳߲��зۼ������濼�̿�������ʧ��ס��֦�־����ܻ���ʦ������Ԫ����ɰ�⻻̫ģƶ�����ｭ��Ķľ����ҽУ���ص�����Ψ�们վ�����ֹĸ�д��΢�Է�������ĳ�����������൹�������ù�Զ���Ƥ����ռ����Ȧΰ��ѵ�ؼ��ҽ��ƻ���������ĸ�����ֶ���˫��������ʴ����˿Ůɢ��������Ժ�䳹����ɢ�����������������Ѫ��ȱ��ò�����ǳ���������������̴���������������Ͷ��ū����ǻӾഥ�����ͻ��˶��ٻ����δͻ�ܿ���ʪƫ�Ƴ�ִ����կ�����ȶ�Ӳ��Ŭ�����Ԥְ������Э�����ֻ���ì������ٸ�������������ͣ����Ӫ�ո���Ǯ��������ɳ�˳��ַ�е�ذ����İ��������۵��յ���ѽ�ʰɿ��ֽ�������������ĩ�����ӡ�伱�����˷�¶��Ե�������������Ѹ��������ֽҹ������׼�����ӳ��������ɱ���׼辧�尣ȼ��������ѿ��������̼��������ѿ����б��ŷ��˳������͸˾Σ������Ц��β��׳����������������ţ��Ⱦ�����������Ƽ�ֳ�����ݷô���ͭ��������ٺ�����Դ��ظ���϶¯����úӭ��ճ̽�ٱ�Ѯ�Ƹ�������Ը���������̾䴿������������³�෱�������׶ϣ�ذܴ�����ν�л��ܻ���ڹ��ʾ����ǳ���������Ϣ������������黭�������������躮ϲ��ϴʴ���ɸ���¼������֬ׯ��������ҡ���������������Ű²��ϴ�;�������Ұ�ž�ıŪ�ҿ�����ʢ��Ԯ���Ǽ���������Ħæ�������˽����������������Ʊܷ�������Ƶ�������Ҹ�ŵ����Ũ��Ϯ˭��л�ڽ���Ѷ���鵰�պ������ͽ˽������̹����ù�����ո��伨���ܺ���ʹ�������������ж�����׷���ۺļ���������о�Ѻպ��غ���Ĥƪ��פ������͹�ۼ���ѩ�������������߲��������ڽ������˹�̿������������ǹ���ð������Ͳ���λ�����Ϳζ����Ϻ�½�����𶹰�Ī��ɣ�·쾯���۱�����ɶ���ܼ��Ժ��濵�������԰ǻ�����������������������ƭ�ݽ赤�ɶ��ٻ���ϡ���������ǳӵѨ������ֽ����������Ϸ��������ò�����η��ɰ���������ˢ�ݺ���������©�������Ȼľ��з������Բ����ҳ�����ײ����ȳ����ǵ������������ɨ������оү���ؾ����Ƽ��ڿ��׹��ð��ѭ��ף���Ͼ����������ݴ���ι�������Ź�ó����ǽ���˽�ī������ж����ڱ������������������𾪶ټ�����ķ��ɭ��ʥ���մʳٲ��ھ�';
	public static $fontSize = 30;     // ��֤�������С(px)
	public static $useCurve = true;   // �Ƿ񻭻�������
	public static $useNoise = false;   // �Ƿ�����ӵ�	
	public static $imageH = 0;        // ��֤��ͼƬ��
	public static $imageL = 0;        // ��֤��ͼƬ��
	public static $length = 2;        // ��֤��λ��
	public static $bg = array(243, 251, 254);  // ����
	
	protected static $_image = null;     // ��֤��ͼƬʵ��
	protected static $_color = null;     // ��֤��������ɫ
	
	/**
	 * �����֤�벢����֤���ֵ�����session��
	 * ��֤�뱣�浽session�ĸ�ʽΪ�� $_SESSION[self::$seKey] = array('code' => '��֤��ֵ', 'time' => '��֤�봴��ʱ��');
	 */
	public static function entry() {
		// ͼƬ��(px)
		self::$imageL || self::$imageL = self::$length * self::$fontSize * 1.5 + self::$fontSize*1.5; 
		// ͼƬ��(px)
		self::$imageH || self::$imageH = self::$fontSize * 2;
		// ����һ�� self::$imageL x self::$imageH ��ͼ��
		self::$_image = imagecreate(self::$imageL, self::$imageH); 
		// ���ñ���      
		imagecolorallocate(self::$_image, self::$bg[0], self::$bg[1], self::$bg[2]); 
		// ��֤�����������ɫ
		self::$_color = imagecolorallocate(self::$_image, mt_rand(1,120), mt_rand(1,120), mt_rand(1,120));
		// ��֤��ʹ���������
		//$ttf = 'http://static.ui.07073.com/_img/ttfs/' . 4 . '.ttf'; 
		/*
        $ttf_arr = array(2);
		$ttf_key = array_rand($ttf_arr);
		$rand_ttf = mt_rand(1, 20);
		$rand_ttf = $ttf_arr[$ttf_key];*/
		$ttf = dirname(__FILE__) . '/ttfs/simhei.ttf';  
		
		if (self::$useNoise) {
			// ���ӵ�
			self::_writeNoise();
		} 
		if (self::$useCurve) {
			// �������
			self::_writeCurve();
		}
		
		// ����֤��
		$code = array(); // ��֤��
		$codeNX = 0; // ��֤���N���ַ�����߾�
        $code_arr = str_split(self::$codeSet, 2);
        $codeLen = count($code_arr)-1;
        
		for ($i = 0; $i<self::$length; $i++) {
			$code[$i] = $code_arr[mt_rand(0, $codeLen)];
            // ������֤����ʾ
            $code_tmp = mb_convert_encoding($code[$i], "html-entities", "gbk");
			$codeNX += mt_rand(self::$fontSize*1.2, self::$fontSize*1.5);
			// дһ����֤���ַ�
			imagettftext(self::$_image, self::$fontSize, mt_rand(-10, 40), $codeNX, self::$fontSize*1.5, self::$_color, $ttf, $code_tmp);
		}
		
		// ������֤��
		isset($_SESSION) || session_start();
		$_SESSION[self::$seKey]['code'] = implode('', $code); // ��У���뱣�浽session
		$_SESSION[self::$seKey]['time'] = time();  // ��֤�봴��ʱ��

		header('Cache-Control: private, max-age=0, no-store, no-cache, must-revalidate');
		header('Pragma: no-cache');		
		header("content-type: image/png");
	
		// ���ͼ��
		imagepng(self::$_image); 
		imagedestroy(self::$_image);
	}
	
	/** 
	 * ��һ������������һ�𹹳ɵ�������Һ���������������(����Ըĳɸ�˧�����ߺ���) 
     *      
     *      ���е���ѧ��ʽզ����������д����
	 *		�����ͺ�������ʽ��y=Asin(��x+��)+b
	 *      ������ֵ�Ժ���ͼ���Ӱ�죺
	 *        A��������ֵ������������ѹ���ı�����
	 *        b����ʾ������Y���λ�ù�ϵ�������ƶ����루�ϼ��¼���
	 *        �գ�����������X��λ�ù�ϵ������ƶ����루����Ҽ���
	 *        �أ��������ڣ���С������T=2��/�O�بO��
	 *
	 */
    protected static function _writeCurve() {
		$A = mt_rand(1, self::$imageH/2);                  // ���
		$b = mt_rand(-self::$imageH/4, self::$imageH/4);   // Y�᷽��ƫ����
		$f = mt_rand(-self::$imageH/4, self::$imageH/4);   // X�᷽��ƫ����
		$T = mt_rand(self::$imageH*1.5, self::$imageL*2);  // ����
		$w = (2* M_PI)/$T;
						
		$px1 = 0;  // ���ߺ�������ʼλ��
		$px2 = mt_rand(self::$imageL/2, self::$imageL * 0.667);  // ���ߺ��������λ�� 	    	
		for ($px=$px1; $px<=$px2; $px=$px+ 0.9) {
			if ($w!=0) {
				$py = $A * sin($w*$px + $f)+ $b + self::$imageH/2;  // y = Asin(��x+��) + b
				$i = (int) ((self::$fontSize - 6)/4);
				while ($i > 0) {	
				    imagesetpixel(self::$_image, $px + $i, $py + $i, self::$_color);  // ���ﻭ���ص��imagettftext��imagestring����Ҫ�úܶ�				    
				    $i--;
				}
			}
		}
		
		$A = mt_rand(1, self::$imageH/2);                  // ���		
		$f = mt_rand(-self::$imageH/4, self::$imageH/4);   // X�᷽��ƫ����
		$T = mt_rand(self::$imageH*1.5, self::$imageL*2);  // ����
		$w = (2* M_PI)/$T;		
		$b = $py - $A * sin($w*$px + $f) - self::$imageH/2;
		$px1 = $px2;
		$px2 = self::$imageL;
		for ($px=$px1; $px<=$px2; $px=$px+ 0.9) {
			if ($w!=0) {
				$py = $A * sin($w*$px + $f)+ $b + self::$imageH/2;  // y = Asin(��x+��) + b
				$i = (int) ((self::$fontSize - 8)/4);
				while ($i > 0) {			
				    imagesetpixel(self::$_image, $px + $i, $py + $i, self::$_color);  // ����(while)ѭ�������ص��imagettftext��imagestring�������Сһ�λ�����������whileѭ��������Ҫ�úܶ�	
				    $i--;
				}
			}
		}
	}
	
	/**
	 * ���ӵ�
	 * ��ͼƬ��д��ͬ��ɫ����ĸ������
	 */
	protected static function _writeNoise() {
		for($i = 0; $i < 10; $i++){
			//�ӵ���ɫ
		    $noiseColor = imagecolorallocate(
		                      self::$_image, 
		                      mt_rand(150,225), 
		                      mt_rand(150,225), 
		                      mt_rand(150,225)
		                  );
			for($j = 0; $j < 5; $j++) {
				// ���ӵ�
			    imagestring(
			        self::$_image,
			        5, 
			        mt_rand(-10, self::$imageL), 
			        mt_rand(-10, self::$imageH), 
			        self::$codeSet[mt_rand(0, 27)], // �ӵ��ı�Ϊ�������ĸ������
			        $noiseColor
			    );
			}
		}
	}
	
	/**
	 * ��֤��֤���Ƿ���ȷ
	 *
	 * @param string 	$code 		�û���֤��
	 * @param boo  	 	$del_sess	��֤���Ƿ�ɾ��session 
	 *                          	true:�� 
	 *                          	false:�� ajax��֤ʱʹ��false,�ύ�Ժ���֤��ʹ��true
	 * 
	 * @param bool �û���֤���Ƿ���ȷ
	 */
	public static function check($code) {	
		//$code = strtoupper($code);//��תΪ��д
		isset($_SESSION) || session_start();
        $captcha_arr = array();
        
        if (!isset($_SESSION[self::$seKey]) || empty($_SESSION[self::$seKey])) {
            return false;
        }
        
        // ���session,����sesion�طŹ���
        $captcha_arr = $_SESSION[self::$seKey];
        unset($_SESSION[self::$seKey]);
        
		// ��֤�벻��Ϊ��
		if(empty($code)) {
			return false;
		}
		
		// session ����
		if(time() - $captcha_arr['time'] > self::$expire) {
			return false;
		}

		if($code == $captcha_arr['code']) {
			return true;
		}

		return false;
	}
}


// useage
/*
YL_Security_Secoder::$useNoise = false;  // Ҫ����ȫ�Ļ��ĳ�true
YL_Security_Secoder::$useCurve = true;
YL_Security_Secoder::entry();
*/

/*
// ��֤��֤��
if (!YL_Security_Secoder::check(@$_POST['secode'])) {
	print 'error secode';
}
*/