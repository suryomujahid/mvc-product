<?php

class App{

        function login($con, $table, $username, $password, $redirect){
            session_start();

            $sql = "SELECT * FROM $table WHERE username='$username' AND password='$password'";

            $jalan = mysqli_query($con, $sql);

            $check = mysqli_num_rows($jalan);

            if($check > 0){
                $_SESSION['user']=$username;
                echo "<script>
                document.location.href='$redirect';
                </script>";
            }
            else{
                echo "<script>
                alert('Gagal login, periksa kembali username dan passwordnya');
                document.location.href='index.php';
                </script>";
            }
        }

        function create($con, $table, array $field, $redirect){
            $sql = "INSERT INTO $table SET ";

            foreach($field as $key => $value){
                $sql.=" $key = '$value',";
            }

            $sql = rtrim($sql, ',');

            $jalan = mysqli_query($con, $sql);

            if($jalan){
                $_SESSION['is_success'] = '1';
                $_SESSION["alert_time_stamp"] = time();
                echo "<script>
                document.location.href='$redirect';
                </script>";
            }
            else{
                $_SESSION['is_success'] = 'false';
                $_SESSION["alert_time_stamp"] = time();
                echo "<script>
                document.location.href='$redirect';
                </script>";
            }
        }

        function read($con, $table){
            $sql = "SELECT * FROM $table";
            $jalan = mysqli_query($con, $sql);
            while($data = mysqli_fetch_assoc($jalan))
                $isi[] = $data;
                return @$isi;
        }

        function delete($con, $tabel, $where, $redirect){
            $sql = "DELETE FROM $tabel WHERE $where";
            $jalan = mysqli_query($con, $sql);
            if($jalan){
                $_SESSION['is_success'] = '3';
                $_SESSION["alert_time_stamp"] = time();
                echo "<script>document.location.href='$redirect'</script>";
            }else{
                echo "<script>alert('Data gagal dihapus!');document.location.href='$redirect'</script>";
            }
        }

        function edit($con, $tabel, $where){
            $sql = "SELECT * FROM $tabel WHERE $where";
            $jalan = mysqli_query($con, $sql);
            $tampung = mysqli_fetch_assoc($jalan);
            return $tampung;
        }

        function update($con, $tabel, array $field, $where, $redirect){
            $sql = "UPDATE $tabel SET ";
            foreach($field as $key => $value){
                $sql.= " $key = '$value',";
            }
            $sql = rtrim($sql, ',');
            $sql.= " WHERE $where";
            $jalan = mysqli_query($con, $sql);

            if($jalan){
                $_SESSION['is_success'] = '2';
                $_SESSION["alert_time_stamp"] = time();
                echo "<script>document.location.href='$redirect'</script>";
            }else{
                $_SESSION['is_success'] = 'false';
                $_SESSION["alert_time_stamp"] = time();
                echo "<script>document.location.href='$redirect'</script>";
            }
        }

        function upload($foto, $tempat){
            $alamat = $foto['tmp_name'];
            $namafile = $foto['name'];
            move_uploaded_file($alamat, "$tempat/$namafile");
            return $namafile;
        }
}
