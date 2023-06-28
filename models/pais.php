<?php
    namespace Models;
    class Pais{
        protected static $conn;
        protected static $columnsTbl=['id_PAIS','name_paises'];
        private $id_PAIS;
        private $name_paises;
        public function __construct($args = []){
            $this->id_PAIS = $args['id_PAIS'] ?? '';
            $this->name_paises = $args['name_paises'] ?? '';
        }
        public function saveData($data){
            $delimiter = ":";
            $dataBd = $this->sanitizarAttributos();
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO countries ($cols) VALUES ($valCols)";
            $stmt= self::$conn->prepare($sql);
            try {
                $stmt->execute($data);
                $response=[[
                    'id_PAIS' => self::$conn->lastInsertId(),
                    'name_paises' => $data['name_paises']
                ]];
            }catch(\PDOException $e) {
                return $sql . "<br>" . $e->getMessage();
            }
            return json_encode($response);
        }       
        public function loadAllData(){
            $sql = "SELECT id_PAIS,name_paises FROM Paises";
            $stmt= self::$conn->prepare($sql);
            $stmt->execute();
            $countries = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $countries;
        }
        public function deleteData($id){
            $sql = "DELETE FROM Paises where id_PAIS = :id";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
        public function updateData($data){
            $sql = "UPDATE Paises SET name_paises = :name_paiseswhere id_country = :id";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':name_country', $data['name_paises']);
            $stmt->bindParam(':id', $data['id_country']);
            $stmt->execute();
        }
        public static function setConn($connBd){
            self::$conn = $connBd;
        }
        public function atributos(){
            $atributos = [];
            foreach (self::$columnsTbl as $columna){
                if($columna === 'id_country') continue;
                $atributos [$columna]=$this->$columna;
             }
             return $atributos;
        }
        public function sanitizarAttributos(){
            $atributos = $this->atributos();
            $sanitizado = [];
            foreach($atributos as $key => $value){
                $sanitizado[$key] = self::$conn->quote($value);
            }
            return $sanitizado;
        }
    }

?>