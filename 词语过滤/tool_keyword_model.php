<?php if ( ! defined('BASEPATH')) {exit('No direct script access allowed');}
/**
* �ؼ���ƥ���滻model
*
* @date 2014/04/17
*/
class tool_keyword_model extends CI_Model {
    private $rword = '';//�����Ĺؼ�������
    public function __construct() {
        $this->load->model('jkkeywords_model');
        // ��ð��ֽڱ���Ĺؼ���
        $this->rword = $this->jkkeywords_model->getAllJkwordByte();
    }
    
    /**
     +----------------------------------------------------------
     * ���˹ؼ���
     +----------------------------------------------------------
     * @access	public
	 * @para	article		string		��������
	 * @para	type		bool		$type=1 ��� $type=2 ���� *
	 * @return	type		string		���������滻���
     +----------------------------------------------------------
     */
	public function replace($article,$type=1){
		$len=strlen($article);
		$begin=$end=array();
		for($i=0;$i<$len;$i++){
			if($n=$this->find_keyword($article,$this->rword,$i)){

				$begin[]=$i;
				$end[]=$i+$n;
				//����*
				if($type==2){
					for($n;$n>0;$n--){
						$article{$i}='*';
						$i++;
					}
				}
				$i=$i+$n;
			}
		}
		//���
		if($type==1){
			$len=count($begin);
			for($k=$len;$k>=0;$k--){
				if(isset($end[$k])) {
                    $article=$this->insertstr($article,$end[$k],'</font>');
                }
				if(isset($begin[$k])) {
                    $article=$this->insertstr($article,$begin[$k],'<font color=red>');
                }
			}
		}
		return	$article;
	}
    
    
    /**
     +----------------------------------------------------------
     * ���ҹؼ���
     +----------------------------------------------------------
     * @access	public
	 * @para	article		string		��������
     +----------------------------------------------------------
     */
	public function findKeyword($article){
		$len=strlen($article);
		for($i=0;$i<$len;$i++){
			if($n=$this->find_keyword($article,$this->rword,$i)){
                // ���ҵ��ؼ��־��˳�
                return true;
			}
		}

		return	false;
	}
    
	/**
     +----------------------------------------------------------
     * �ݹ����ָ��λ���Ƿ��йؼ���
     +----------------------------------------------------------
     * @access	public
     +----------------------------------------------------------
     */
	public function find_keyword($article,$rword,$i,$pos=1) {
		if($pos>20) {
            return false;
        }
	
        if (isset($article{$i}) && isset($rword['key'][$article{$i}])) {
            $temp = $rword['key'][$article{$i}];
            
            if (isset($temp['val']) && ($temp['val'] == 1)) {
                return $pos;
            }
            if (!isset($temp['key']) || empty($temp['key'])) {
                return false;
            }
        } else {
            return false;
        }
		$pos++;
		$rword = $rword['key'][$article{$i}];
		return	$this->find_keyword($article,$rword,$i+1,$pos);
	}

	/**
     +----------------------------------------------------------
     * ָ��λ�ò����ַ�
     +----------------------------------------------------------
     * @access	public
     +----------------------------------------------------------
     */

	public function insertstr($str,$pos,$instr){
		return	substr($str,0,$pos).$instr.substr($str,$pos,strlen($str));
	}
}