<?php
 // Filename: /module/Blog/src/Blog/Mapper/ZendDbSqlMapper.php
 namespace Blog\Mapper;

 use Blog\Model\PostInterface;
 use Zend\Db\Adapter\AdapterInterface;

 class ZendDbSqlMapper implements PostMapperInterface
 {
     /**
      * @var \Zend\Db\Adapter\AdapterInterface
      */
     protected $dbAdapter;

     /**
      * @param AdapterInterface  $dbAdapter
      */
     public function __construct(AdapterInterface $dbAdapter)
     {
         $this->dbAdapter = $dbAdapter;
     }

     /**
      * @param int|string $id
      *
      * @return PostInterface
      * @throws \InvalidArgumentException
      */
     public function find($id)
     {
     }

     /**
      * @return array|PostInterface[]
      */
     public function findAll()
     {
        $sql    = new Sql($this->dbAdapter);
        $select = $sql->select('posts');

        $stmt   = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        \Zend\Debug\Debug::dump($result);die();

        //return $result;
     }
 }

 ?>