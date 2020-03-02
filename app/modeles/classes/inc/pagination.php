<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 30/11/2016
 * Time: 21:32
 */

class Pagination {

    private  $table  ;
    private  $RecordPage ;
    private  $Page = 1 ;
    private  $currentPage = 1  ;
    private  $OrderBy = null;
    private  $where  = null;
    private  $total ;


    public  function  __construct($table, $count)
    {
       $this->table  =  $table ;
        $this->RecordPage =  $count ;
    }

    public  function  setQuery($sql)
    {
        if($sql == null)
        {
            $q = "SELECT * FROM "  . $this->table ;

            if($this->where !=null)
            {
                $q = $q . " WHERE ";
                for($i = 0 ; $i < count($this->where) ; $i++)
                {
                    $and = ($i>0) ?  ' AND '  : '';

                    $q = $q.$and.$this->where[$i][0].$this->where[$i][1].$this->where[$i][2];
                }
            }

            if($this->OrderBy !=null)
            {
                $q =$q." ORDER BY  " . $this->OrderBy[0]. "  ". $this->OrderBy[1] ;
            }
            return $q ;
        }
        return $sql ;
    }

    /**
     * @param null $OrderBy
     */
    public function setOrderBy($OrderBy)
    {
        $this->OrderBy = $OrderBy;
    }

    /**
     * @param null $where
     */
    public function setWhere($where)
    {
        $this->where = $where;
    }



    /**
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }



    /**
     * @return null
     */
    public function getWhere()
    {
        return $this->where;
    }



    public  function  reloadPages($db)
    {
        $query = $db->myQuery($this->setQuery(null));

        		$this->total =  $query->rowCount();

		if($this->total>$this->RecordPage)
        {
        		$t =$this->total/$this->RecordPage;

 			$pages = intval(round($t,PHP_ROUND_HALF_EVEN));

			$final = $pages * $this->RecordPage;

			if($final < $this->total)

            		$this->Pages = $pages+1;
            else
				$this->Pages = $pages;
		}else{
        			$this->Pages = 1;
 		}
    }


    public  function getRecords($page, $db)
    {
        $this->reloadPages($db);

        if($page > $this->Page)
        {
            $this->Page  = $page ;

            $record  =  ($page - 1)   *  $this->RecordPage ;

            $q = $this->setQuery(null);

            $q  = $q . " LIMIT " . $record . ", " . $this->RecordPage . " ";

           return $db->myQuery($q);
        }
        return false;
    }
}