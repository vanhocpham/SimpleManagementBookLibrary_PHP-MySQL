<?php
/**
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 9/10/2018
 * Time: 9:35 AM
 */
class Manage{
    private $con;
    function __construct()
    {
        require '../database/db.php';
        $db=new Database();
        $this->con=$db->connect();
    }

    public function manageRecordwithPagination($table,$pno){
        $a = $this->pagination($this->con,$table,$pno,10);
        if ($table == "categories") {
            $sql = "SELECT p.cid,p.name_cat as category, c.name_cat as parent, p.status FROM categories p LEFT JOIN categories c ON p.parent_cat=c.cid ".$a["limit"];
        }else if($table == "book") {
            $sql = "SELECT b.b_id,b.book_name,c.name_cat,a.author_name,b.added_date,b.b_status FROM book b,author a,categories c WHERE b.aid = a.aid AND b.cid = c.cid " . $a["limit"];
        }
        else {
            $sql = "SELECT * FROM " . $table . " " . $a["limit"];
        }
        $result=$this->con->query($sql)or die($this->con->error);
        $rows=array();
        if($result->num_rows>0){
            while ($row=$result->fetch_assoc()){
                $rows[]=$row;
            }
        }
        return ["rows"=>$rows,"pagination"=>$a["pagination"]];
    }

    private function pagination($con,$table,$pno,$n){
        $query = $con->query("SELECT COUNT(*) as rows FROM  ".$table);
        $row = mysqli_fetch_assoc($query);
        //$totalRecords = 100000;
        $pageno = $pno;
        $numberOfRecordsPerPage = $n;

        $last = ceil($row["rows"]/$numberOfRecordsPerPage);

        $pagination = "<ul class='pagination'>";

        if ($last != 1) {
            if ($pageno > 1) {
                $previous = "";
                $previous = $pageno - 1;
                $pagination .= "<li class='page-item'><a class='page-link' pn='" . $previous . "' href='#' style='color:#333;'> Previous </a></li></li>";
            }
            for ($i = $pageno - 5; $i < $pageno; $i++) {
                if ($i > 0) {
                    $pagination .= "<li class='page-item'><a class='page-link' pn='" . $i . "' href='#'> " . $i . " </a></li>";
                }

            }
            $pagination .= "<li class='page-item'><a class='page-link' pn='" . $pageno . "' href='#' style='color:#333;'> $pageno </a></li>";
            for ($i = $pageno + 1; $i <= $last; $i++) {
                $pagination .= "<li class='page-item'><a class='page-link' pn='" . $i . "' href='#'> " . $i . " </a></li>";
                if ($i > $pageno + 4) {
                    break;
                }
            }
            if ($last > $pageno) {
                $next = $pageno + 1;
                $pagination .= "<li class='page-item'><a class='page-link' pn='" . $next . "' href='#' style='color:#333;'> Next </a></li></ul>";
            }
        }
        $limit = "LIMIT ".($pageno - 1) * $numberOfRecordsPerPage.",".$numberOfRecordsPerPage;

        return ["pagination"=>$pagination,"limit"=>$limit];
    }
    public function deleteRecord($table,$pk,$id){
        if($table == "categories"){
            $pre_stmt = $this->con->prepare("SELECT ".$id." FROM categories WHERE parent_cat = ?");
            $pre_stmt->bind_param("i",$id);
            $pre_stmt->execute();
            $result = $pre_stmt->get_result() or die($this->con->error);
            if ($result->num_rows > 0) {
                return "DEPENDENT_CATEGORY";
            }else{
                $pre_stmt = $this->con->prepare("DELETE FROM ".$table." WHERE ".$pk." = ?");
                $pre_stmt->bind_param("i",$id);
                $result = $pre_stmt->execute() or die($this->con->error);
                if ($result) {
                    return "CATEGORY_DELETED";
                }
            }
        }else{
            $pre_stmt = $this->con->prepare("DELETE FROM ".$table." WHERE ".$pk." = ?");
            $pre_stmt->bind_param("i",$id);
            $result = $pre_stmt->execute() or die($this->con->error);
            if ($result) {
                return "DELETED";
            }
        }
    }
    public function getSingleRecord($table,$pk,$id){
        $pre_stmt = $this->con->prepare("SELECT * FROM ".$table." WHERE ".$pk."= ? LIMIT 1");
        $pre_stmt->bind_param("i",$id);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        }
        return $row;
    }

    public function update_record($table,$where,$fields){
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
            // id = '5' AND m_name = 'something'
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        foreach ($fields as $key => $value) {
            //UPDATE table SET m_name = '' , qty = '' WHERE id = '';
            $sql .= $key . "='".$value."', ";
        }
        $sql = substr($sql, 0,-2);
        $sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
        if(mysqli_query($this->con,$sql)){
            return "UPDATED";
        }
    }
}
//$obj =new Manage();
//echo $obj->deleteRecord("categories","cid",9);


