-- 在test_table 表的 valid_status 字段之后，新增一个字段，设置对应的类型，长度，是否为null，默认值，注释
ALTER TABLE hustoj_users ADD COLUMN `status` varchar(40) NOT NULL DEFAULT '0' COMMENT '是否登录' ;
-- 修改一个字段的类型
ALTER TABLE hustoj_users MODIFY status tinyint(2) DEFAULT '0' COMMENT '是否登录';

-- 修改一个字段的名称，此时要重新指定该字段的类型
ALTER TABLE test_table CHANGE test_value_old test_value_new VARCHAR(10) NOT NULL DEFAULT '' COMMENT '字段注释';

-- 删除test_table表的 test_value字段
ALTER TABLE hustoj_users DROP COLUMN status;

ALTER TABLE hustoj_users ADD COLUMN `email` varchar(40);
ALTER TABLE hustoj_users ADD COLUMN `school` varchar(40);
