select r_name, MAX(s_acctbal) from supplier, nation, region where n_nationkey=s_nationkey and 
n_regionkey=r_regionkey group by r_name;