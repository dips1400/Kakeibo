/*create table user(userid int AUTO_INCREMENT PRIMARY KEY,user_firstname VARCHAR(20) not NULL,user_lastname VARCHAR(255) not NULL,emailid VARCHAR(255),upassword VARCHAR(255));*/
create table user(userid int not null AUTO_INCREMENT PRIMARY KEY,user_firstname VARCHAR(20) not NULL,user_lastname VARCHAR(255) not NULL,emailid VARCHAR(255),upassword VARCHAR(255))AUTO_INCREMENT=1;

/*create TABLE account(accid int PRIMARY KEY AUTO_INCREMENT,accno VARCHAR(255),balance FLOAT,acc_holdername varchar(255),userid int,FOREIGN key(userid) REFERENCES user(userid));*/
create TABLE account(accid int PRIMARY KEY AUTO_INCREMENT not null,accno VARCHAR(255),balance FLOAT,acc_holdername varchar(255),userid int,FOREIGN key(userid) REFERENCES user(userid)) AUTO_INCREMENT =1;


/*create table ewallet(ewalletid int PRIMARY key AUTO_INCREMENT,wbalance FLOAT,source VARCHAR(255),spend_option varchar(255),userid int,FOREIGN key(userid) REFERENCES user(userid));*/
create table ewallet(ewalletid int PRIMARY key AUTO_INCREMENT not null,wbalance FLOAT,source VARCHAR(255),spend_option varchar(255),userid int,FOREIGN key(userid) REFERENCES user(userid))AUTO_INCREMENT=1;


/*create table card(cardid int PRIMARY key AUTO_INCREMENT,cardtype VARCHAR(7),cardbankname varchar(30),cardexpirydate date,cardcvv int,cardno int(17),userid int,FOREIGN key(userid) REFERENCES user(userid),ewalletid int,FOREIGN key(ewalletid) REFERENCES ewallet(ewalletid));*/
/*create table card(cardid int PRIMARY key AUTO_INCREMENT not null,cardtype VARCHAR(7),cardbankname varchar(30),cardexpirydate date,cardcvv int,cardno int(17),userid int,FOREIGN key(userid) REFERENCES user(userid),ewalletid int,FOREIGN key(ewalletid) REFERENCES ewallet(ewalletid))AUTO_INCREMENT=1;*/
create table card(cardid int PRIMARY key AUTO_INCREMENT not null,cardtype VARCHAR(7),cardbankname varchar(30),cardexpirydate date,cardcvv int,cardno int(17))AUTO_INCREMENT=1;


/*create table transactions(id int(11) PRIMARY key AUTO_INCREMENT,transaction_id VARCHAR(255) not null,amount float(10,2) not null,tstatus VARCHAR(255) not null,captured_at DATETIME not null DEFAULT current_timestamp(),userid int,FOREIGN key(userid) REFERENCES user(userid),cardid int,FOREIGN KEY(cardid) REFERENCES card(cardid),ewalletid int,FOREIGN key(ewalletid) REFERENCES ewallet(ewalletid));*/
create table transactions(id int(11) PRIMARY key AUTO_INCREMENT not null,transaction_id VARCHAR(255) not null,amount float(10,2) not null,tstatus VARCHAR(255) not null,captured_at DATETIME not null DEFAULT current_timestamp(),userid int,FOREIGN key(userid) REFERENCES user(userid),cardid int,FOREIGN KEY(cardid) REFERENCES card(cardid),ewalletid int,FOREIGN key(ewalletid) REFERENCES ewallet(ewalletid))AUTO_INCREMENT=1;

/*create table calendar(calgoal_id int(20) PRIMARY key AUTO_INCREMENT,start_date date,end_date date,userid int,FOREIGN key(userid) REFERENCES user(userid));*/
/*create table events(calgoal_id int(20) PRIMARY key AUTO_INCREMENT not null,start_date date,end_date date,userid int,FOREIGN key(userid) REFERENCES user(userid))AUTO_INCREMENT=1;*/

/*create table goals(goals_id int PRIMARY key AUTO_INCREMENT,goal_name varchar(255),goal_status varchar(50),userid int,FOREIGN key(userid) REFERENCES user(userid),calgoal_id int(20),FOREIGN KEY(calgoal_id) REFERENCES calendar(calgoal_id));*/
create table goals(goals_id int PRIMARY key AUTO_INCREMENT not null,goal_name varchar(255),goal_status varchar(50),userid int,FOREIGN key(userid) REFERENCES user(userid),calgoal_id int(20),FOREIGN KEY(calgoal_id) REFERENCES calendar(calgoal_id)) AUTO_INCREMENT=1;

create table  card_user(userid int,FOREIGN key(userid) REFERENCES user(userid),cardid int,FOREIGN KEY(cardid) REFERENCES card(cardid),amount int);

CREATE TABLE `expenses` (
  `expense_id` int(20) NOT NULL,
  `userid` varchar(15) NOT NULL,
  `expense` int(20) NOT NULL,
  `expensedate` varchar(15) NOT NULL,
  `expensecategory` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

ALTER TABLE `expenses`
  MODIFY `expense_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

create table goals(goals_id int PRIMARY key AUTO_INCREMENT not null,goal_name varchar(255),goal_status varchar(50),userid int(11) not null,id int(11)not null);

CREATE table transaction(transactionid int not null AUTO_INCREMENT PRIMARY KEY,userid int,FOREIGN key(userid) REFERENCES user(userid),ewalletid int,FOREIGN key(ewalletid) REFERENCES ewallet(ewalletid),amount int)AUTO_INCREMENT=1;

create table savings (savingsid int not null AUTO_INCREMENT PRIMARY KEY,savings_dtls varchar(25),saving_amount int,userid int,FOREIGN key(userid) REFERENCES user(userid))AUTO_INCREMENT=1;
ALTER table savings add COLUMN updated_amount int;

create table saving_updatedamount(updateamountid int not null AUTO_INCREMENT PRIMARY KEY,savingsid int,FOREIGN key(savingsid) REFERENCES savings(savingsid),userid int,FOREIGN key(userid) REFERENCES user(userid),updatedamount int)AUTO_INCREMENT=1;

create table biggersavings(bigsid int not null AUTO_INCREMENT PRIMARY KEY,details varchar(30),amount_to_save int,userid int,FOREIGN key(userid) REFERENCES user(userid))AUTO_INCREMENT=1;
ALTER table biggersavings add COLUMN updateam int;
create table b_s(bs int not null AUTO_INCREMENT PRIMARY KEY,bigsid int, FOREIGN key(bigsid) REFERENCES biggersavings(bigsid),userid int,FOREIGN key(userid) REFERENCES user(userid),finalamt int)AUTO_INCREMENT=1;