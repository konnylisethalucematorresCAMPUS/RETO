<?php
    namespace Models;
    class Pais{
        protected static $conn;
        protected static $columnsTbl=['id_pais','name_pais'];
        private $id_pais;
        private $name_pais;
        public function __construct($args = []){
            $this->id_pais = $args['id_pais'] ?? '';
            $this->name_pais = $args['name_pais'] ?? '';
        }
        public function saveData($data){
            $delimiter = ":";
            $dataBd = $this->sanitizarAttributos();
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO paises ($cols) VALUES ($valCols)";
            $stmt= self::$conn->prepare($sql);
            try {
                $stmt->execute($data);
                $response=[[
                    'id_pais' => self::$conn->lastInsertId(),
                    'name_pais' => $data['name_pais']
                ]];
            }catch(\PDOException $e) {
                return $sql . "<br>" . $e->getMessage();
            }
            return json_encode($response);
        }       
        public function loadAllData(){
            $sql = "SELECT id_pais,name_pais FROM paises";
            $stmt= self::$conn->prepare($sql);
            $stmt->execute();
            $paises = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $paises;
        }
        public function deleteData($id){
            $sql = "DELETE FROM paises where id_pais = :id";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
        public function updateData($data){
            $sql = "UPDATE paises SET name_pais = :name_pais where id_pais = :id";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':name_pais', $data['name_pais']);
            $stmt->bindParam(':id', $data['id_pais']);
            $stmt->execute();
        }
        public static function setConn($connBd){
            self::$conn = $connBd;
        }
        public function atributos(){
            $atributos = [];
            foreach (self::$columnsTbl as $columna){
                if($columna === 'id_pais') continue;
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