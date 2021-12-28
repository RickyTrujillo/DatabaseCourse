create trigger t2 after update on customer when old.c_acctbal>0 and NEW.c_acctbal<0 
begin 
	update customer set c_comment= c_comment || "Negative balance!!! Add money now!" where c_custkey=NEW.c_custkey;
end;


create trigger t3 after update on customer when old.c_acctbal<0 and NEW.c_acctbal>0
begin
	update customer set c_comment= substr(c_comment, 1, length(c_comment)-34) where c_custkey=NEW.c_custkey;
end; 

update customer set c_acctbal= -100 where c_custkey in (select c_custkey from customer, region, nation where r_regionkey=n_regionkey and n_nationkey = c_nationkey);

select count(distinct c_custkey) from customer, nation where c_acctbal<0 and c_nationkey=n_nationkey and n_name='CHINA';

update customer set c_acctbal=100 where c_custkey in (select c_custkey from customer, nation where c_nationkey=n_nationkey and n_name='JAPAN');

select count (distinct	c_custkey) from customer, nation, region where c_acctbal<0 and c_nationkey=n_nationkey and n_regionkey=r_regionkey and r_name='ASIA';