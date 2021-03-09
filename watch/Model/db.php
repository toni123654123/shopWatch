<?php
class Database
{
    private $hostname = "localhost";
    private $username = "root";
    private $pass = "";
    private $db = "watch";


    private $conn = NULL;
    private $result = NULL;


    public function connect()
    {
        $this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->db);
        if (!$this->conn) {
            echo "NOT FOUND 404";
            exit();
        } else {
            mysqli_set_charset($this->conn, 'utf8');
        }

        return $this->conn;
    }

    // Thực thi câu lệnh truy vấn

    public function execute($sql)
    {
        $this->result = $this->conn->query($sql);
        return $this->result;
    }

    // Phương thức đếm số lượng bản ghi
    public function num_rows()
    {
        if ($this->result) {
            $num = mysqli_num_rows($this->result);
        } else {
            $num = 0;
        }
        return $num;
    }

    // Phương thức lấy dữ liệu

    public function getData()
    {
        if ($this->result) {
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }

    // Phương thức lấy toàn bộ dữ liệu

    public function Getall($table)
    {
        $sql = "SELECT * FROM $table";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }

    public function getLimit($table, $sort, $number)
    {
        $sql = "SELECT * FROM $table ORDER BY proId $sort LIMIT $number";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }

    public function Get($table, $id, $val)
    {
        $sql = "SELECT * FROM $table WHERE $id = '$val' ";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }


    // Phương thức lấy dữ liệu theo id
    public function getId($table, $id, $val)
    {
        $sql = "SELECT * FROM $table WHERE $id = '$val' ";
        $this->execute($sql);
        if ($this->num_rows() != 0) {
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }


    // Phương thức thêm dữ liệu
    public function Insert($table, $data = [])

    {   //Bước 1: lấy giá trị key của data cho vào 1 mảng
        $keys = array_keys($data);

        // Bước 2: xử lí để có 1 dấu phẩy
        $fields = implode(",", $keys);

        //Bước 3: xử lí giá trị value
        $value_str = '';
        foreach ($data as $key => $value) {
            $value_str .= "'$value',";
        }
        $value_str = trim($value_str, ",");

        $sql = "INSERT INTO $table ($fields) values ($value_str)";
        return $this->execute($sql);
    }

    // Phương thức sửa dữ liệu

    public function Update($table, $id, $data = [], $val)
    {
        // Bước 1: Xử lí chuỗi giá trị
        $str = "";
        foreach ($data as $key => $value) {
            $str .= "$key = '$value',";
        }

        //Bước 2 : Xóa dấu phẩy ở cuối
        $str = trim($str, ',');

        //Bước 3: Viết câu lệnh sql
        $sql = "UPDATE $table SET $str WHERE $id = $val";
        return $this->execute($sql);
    }

    // Phương thức xóa dữ liệu

    public function Delete($table, $id, $val)
    {
        $sql = "DELETE FROM $table  WHERE $id = $val";
        return $this->execute($sql);
    }

    // Phương thức tìm kiếm dữ liệu

    public function Search($table, $key, $srch)
    {
        $sql = "SELECT * FROM $table WHERE $key like '%$srch%' ";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }

    // Phương thức lọc dữ liệu

    public function Filter($table, $key, $from, $to)
    {
        $sql = "SELECT * FROM $table WHERE  $key BETWEEN $from and $to ";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }

    // Kiểm tra username or email đã tồn tại chưa

    public function check_register($table, $key1, $key2, $val1, $val2)
    {
        $sql = "SELECT * FROM $table where $key1 = '$val1' OR $key2 = '$val2'";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }

    // Đăng nhập

    public function login($table, $key1, $key2, $val1, $val2)
    {
        $sql = "SELECT * FROM $table where $key1 = '$val1' and $key2 = '$val2'";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            return false;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }

    // ORDER

    public function getOrder($table)
    {
        $sql = "SELECT * FROM $table ORDER BY order_id DESC LIMIT 1";
        $this->execute($sql);
        if ($this->num_rows() != 0) {
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }

    public function detaiOrder($table, $val)
    {
        $sql = "SELECT * FROM $table WHERE orders_detail.order_id = '$val' ";
        $this->execute($sql);
        if ($this->num_rows() != 0) {
            $data = ($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }

    // HISTORY ORDER
    public function historyOrder($table, $key, $val)
    {
        $sql = "SELECT * FROM $table WHERE $key = '$val' ";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }
}
