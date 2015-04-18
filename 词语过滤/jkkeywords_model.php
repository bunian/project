<?php if ( ! defined('BASEPATH')) {exit('No direct script access allowed');}
/**
 * ���δ�model
 *
 * @author shao
 * @date   2015/01/16 
 */
include_once SERVER_ROOT . '/system/core/xredis.php';
class jkkeywords_model extends CI_Model {

	private $table_name = 'jkkeywords';

	public function __construct() {
		parent::__construct();
	}
    
    /**
    * ���뵥�����δ�����
    *
    * @param    array   $data       Ҫ���������
    *
    * @return   int                 �������ID
    */
    public function addJkkeywords($data) {
        if (empty($data)) {
            return false;
        }

        $db = $this->load->database('default', TRUE);
        if (false === $db) {
            return false;
        }
        
        // ��������
        foreach ($data AS $key=>$val) {
            $data[$key] = $db->escape_str($val);
        }
        
        $key_str = "`" . implode("`,`", array_keys($data)) . "`";
        $val_str = "'" . implode("','", $data) . "'";
        $sql = "INSERT IGNORE INTO `{$this->table_name}` ({$key_str}) VALUES ({$val_str})";
        $query = $db->query($sql);
        $res = $db->insert_id();
        //���»���
        $this->getAllJkwordByte(false);
        $db->close();
        return $res;
    }
    /**
     * ������ӹؼ��� ��ά���� 
     *
     * @param arary $data �ؼ���
     *
     */
    public function addKeyWords($data) {
        if (!$data) {
            return fasle;
        }
        $keys   = '';
        $result = array();
        foreach ($data as $key => $val) {
            if (!$keys) {
                $keys = array_keys($val);
            }
            foreach ($val as $k => $v) {
                $v = mysql_escape_string($v);
                $val[$k] = $v;
            }
            $result[] = "('" . implode("','", $val) . "')";
        }
        $key_str = "`".implode('`,`', $keys)."`";
        $val_str = implode(',', $result);
        $sql   = "INSERT IGNORE INTO `{$this->table_name}` ({$key_str}) VALUES {$val_str}";
        $db    = $this->load->database('default', TRUE);
        $query = $db->query($sql);
        //���»���
        $this->getAllJkwordByte(false);
        return true;
    }
    
    /**
    * ��������������δ�
    *
    * @param    array       $where      ��������
    * @param    int         $page       ��ǰҳ
    * @param    int         $page_size  ÿҳ��ʾ������
    *
    * @return   array   
    */
    public function getJkkeywordsBy($where, $page=0, $page_size=0) {
        $db = $this->load->database('default', TRUE);
        if (false === $db) {
            return false;
        }
        
        $where_sql = $this->makeWhereSql($where);
        $sort_sql = $this->makeSortSql($where);
        $sql = "SELECT * FROM `{$this->table_name}`";
        $sql.= $where_sql;
        $sql.= $sort_sql;

        $page = intval($page);
        $page_size = intval($page_size);
        if (($page > 0) && ($page_size > 0)) {
            $start = ($page - 1) * $page_size;
            $start = max($start, 0);
            $sql .= " LIMIT {$start},{$page_size}";
        }
        $query = $db->query($sql);
        $res = array();

        foreach ($query->result_array() as $key=>$val) {
            $res[$val['id']] = $val;
        }
        $db->close();
        return $res;
    }
    
    /**
    * ��������������δ�����
    *
    * @param    array       $where      ��������
    *
    * @return   array   
    */
    public function getJkkeywordsTotalBy($where) {
        $db = $this->load->database('default', TRUE);
        if (false === $db) {
            return false;
        }

        $where_sql = $this->makeWhereSql($where);
        $sql = "SELECT COUNT(*) AS `new_total` FROM `{$this->table_name}`";
        $sql.= $where_sql;
        $query = $db->query($sql);

        $res = 0;
        $row = $query->row_array();
        if (!empty($row)) {
            $res = intval($row['new_total']);
        }
        $db->close();
        return $res;
    }

    /**
     * ����ID ɾ�����δ�
     * @author shaozhigang
     * @date   2014-06-09
     * 
     * @param  int     $id 	  	Ҫɾ����ID
     * 
     * @return bool 			ɾ���Ƿ�ɹ�
     */
    public function delJkkeywordsById($id) {
    	$id = intval($id);
    	if ($id < 1) {
    		return false;
    	}

    	$db = $this->load->database('default', true);
    	if (false === $db) {
    		return false;
    	}

    	$sql = "DELETE FROM `{$this->table_name}` WHERE `id`='{$id}'";
    	$query = $db->query($sql);
    	$db->close();
    	return true;
    }
    
    /**
     * ����order by ���
     * 
     * @param  array    $where  �������Ĳ�������
     * @param  obj      $db     ���ݿ�������Դ����������
     *
     * @return string   sql���
     */
    private function makeSortSql($where) {
        if (!isset($where['orderby']) || (empty($where['orderby']))) {
            return '';
        }

        $sql_arr = array();

        foreach ($where['orderby'] as $key => $val) {
            $key = mysql_escape_string($key);
            $val = mysql_escape_string($val);
            $sql_arr[] = "`{$key}` {$val}";
        }

        $sql = '';
        if (count($sql_arr) > 0) {
            $sql = ' ORDER BY ' . implode(',', $sql_arr);
        }

        return $sql;
    }
    
    /**
    * ��װSQL
    *
    * @param    array   $data   Ҫ��װ������
    * @param    obj   $db     ���ݿ�������Դ����������
    *
    * @return   string          ��װ��ɵ�SQL
    */
    private function makeWhereSql($where) {
        if (empty($where)) {
            return '';
        }
        $sql_arr = array();

        $sql = '';
        if (count($sql_arr) > 0) {
            $sql = ' WHERE ' . implode(' AND ', $sql_arr);
        }
        return $sql;
    }
    
    /**
    * ���м�ص�����
    *
    * @param    bool    $is_cache   �Ƿ񻺴�
    *
    * @return   array
    */
    public function getAllJkword($is_cache = true) {
        $redis = new XRedis();
        $redis->mconnect(REDIS_TIEBA2, 1);
        $cache_key = 'tieba_jkkeyword';

        $result = array();

        if ($is_cache === TRUE) {
            $result = $redis->getArray($cache_key);
            if ($result !== false) {
                $redis->close();
                return $result;
            }
        }
        
        $where = array();
        // ���δ�����
        $total = $this->getJkkeywordsTotalBy($where);
        if ($total > 0) {
            // ����������δ����ݴ�������
            $page_size = 500;
            $max_page = ceil($total/$page_size);
            $where['orderby'] = array(
                'id' => 'asc',
            );
            for ($page=1; $page<=$max_page; $page++) {
                // ���δ�
                $word_arr = $this->getJkkeywordsBy($where, $page, $page_size);
                foreach ($word_arr as $val) {
                    $result[] = $val['keyword'];
                }
            }
        }
        
        $cache_time = 3600*6;
        $redis->setArray($cache_key, $result, $cache_time);
        $redis->close();
        return $result;
    }
    
    /**
    * ���ֽڱ���ؼ���
    *
    * @param    bool    $is_cache   �Ƿ񻺴�
    *
    * @return   array
    */
    public function getAllJkwordByte($is_cache = true) {
        $redis = new XRedis();
        $redis->mconnect(REDIS_TIEBA2, 1);
        $cache_key = 'tieba_jkkeywordbyte';

        $result = array();

        if ($is_cache === TRUE) {
            $result = $redis->getArray($cache_key);
            if ($result !== false) {
                $redis->close();
                return $result;
            }
        }
        
        $where = array();
        // ���δ�����
        $total = $this->getJkkeywordsTotalBy($where);
        if ($total > 0) {
            // ����������δ����ݴ�������
            $page_size = 500;
            $max_page = ceil($total/$page_size);
            $where['orderby'] = array(
                'id' => 'asc',
            );
            for ($page=1; $page<=$max_page; $page++) {
                // ���δ�
                $word_arr = $this->getJkkeywordsBy($where, $page, $page_size);
                
                // ���ֽڱ�������
                foreach ($word_arr as $val) {
                    
                    $keyword = $val['keyword'];
                   
                    if ($keyword === '') {
                        continue;
                    }
                    $temp='$result';
                    $len=strlen($keyword);
                    
                    for($i=0;$i<$len;$i++){
                        $temp.="['key']['".$keyword{$i}."']";
                    }
                    // ��Щ���˴ʷ�����gbk�������˻ᱨ��
                    @eval($temp.="['val']=1;");
                }
                
            }
        }
        
        $cache_time = 3600*6;
        $redis->setArray($cache_key, $result, $cache_time);
        $redis->close();
        return $result;
    }
}
