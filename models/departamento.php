<?php 
    namespace Models;
    class Departamento{
        protected static $conn;
        protected static $columnsTbl=['id_Dep','name_departamento','id_pais'];
        private $id_Dep;
        private $name_departamento;
        private $id_pais;
        public function __construct($args=[]){
            $this->id_Dep = $args['id_Dep'] ?? '';
            $this->name_departamento = $args['name_departamento'] ?? '';
            $this->id_pais = $args['id_pais'] ?? '';            
        }
        public function saveData($data){
            $delimiter = ":";
            $dataBd = $this->sanitizarAttributos();
            $valCols = $delimiter . join(',:',array_keys($data));
            $cols = join(',',array_keys($data));
            $sql = "INSERT INTO departamentos ($cols) VALUES ($valCols)";
            $stmt= self::$conn->prepare($sql);
            try {
                $stmt->execute($data);
                $response=[[
                    'id_Dep' => self::$conn->lastInsertId(),
                    'name_departamento' => $data['name_departamento'],
                    'id_pais' => $data['id_pais']
                ]];
            }catch(\PDOException $e) {
                return $sql . "<br>" . $e->getMessage();
            }
            return json_encode($response);
        }       
        public function loadAllData(){
            $sql = "SELECT id_Dep,name_departamento,id_pais FROM departamentos";
            $stmt= self::$conn->prepare($sql);
            $stmt->execute();
            $paises = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $paises;
        }
        public function deleteData($id){
            $sql = "DELETE FROM departamentos where id_Dep = :id";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
        public function updateData($data){
            $sql = "UPDATE departamentos SET name_Departamento = :name_Departamento, id_pais = :id_pais where id_Dep = :id_Dep";
            $stmt= self::$conn->prepare($sql);
            $stmt->bindParam(':name_Departamento', $data['name_Departamento']);
            $stmt->bindParam(':id_pais', $data['id_pais']);
            $stmt->bindParam(':id_Dep', $data['id_Dep']);
            $stmt->execute();
        }
        public static function setConn($connBd){
            self::$conn = $connBd;
        }
        public function atributos(){
            $atributos = [];
            foreach (self::$columnsTbl as $columna){
                if($columna === 'id_Dep') continue;
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