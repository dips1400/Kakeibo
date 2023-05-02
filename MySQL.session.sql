create TABLE account(accid int PRIMARY KEY AUTO_INCREMENT,accno VARCHAR(255),balance FLOAT,acc_holdername varchar(255), PRIMARY KEY (userid),
FOREIGN KEY (userid) REFERENCES user(userid));