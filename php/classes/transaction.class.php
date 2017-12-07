<?php
require_once "db.class.php";


class Transaction
{
  private $connection;
public function __construct()
{
   $this->connection=new DB;


}
/*
transaction_type VARCHAR(50) NOT NULL,#debit credit
receiver VARCHAR(50) NOT NULL,
sender VARCHAR(50) NOT NULL,
amount INT NOT NULL,
transactionDate DATETIME NOT NULL
*/
//save transaction to database...
public function saveTransaction($amountInvolved,$transactionType,$receiver,$sender)
{

  return $this->connection->insert("insert into transactions(transaction_type,receiver,sender,amount,transactionDate)
   values('{$transactionType}','{$receiver}','{$sender}','{$amountInvolved}',now())");
}

}

 ?>
