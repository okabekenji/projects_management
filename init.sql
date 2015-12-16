
DROP TABLE `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` longtext NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE `members`;
CREATE TABLE `members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `mail` varchar(255) NOT NULL DEFAULT '' COMMENT 'メールアドレス',
  `password` varchar(255) NOT NULL COMMENT 'パスワード',
  `last_name` varchar(255) DEFAULT '' COMMENT '姓',
  `first_name` varchar(255) DEFAULT '' COMMENT '名',
  `is_admin` tinyint(4) DEFAULT '0' COMMENT '1:管理者',
  `invalid` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '0:無効、1:有効',
  `updated_at` datetime NOT NULL COMMENT 'レコード更新日時',
  `created_at` datetime NOT NULL COMMENT 'レコード作成日時',
  `user_agent` text  COMMENT 'ua',
  `ip_addr` text  COMMENT 'ip',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE `projects`;
CREATE TABLE `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `project_content` text NOT NULL COMMENT '案件内容',
  `status_id` tinyint(20) unsigned NOT NULL COMMENT 'ステータスID',
  `segment_id` tinyint(20) unsigned NOT NULL COMMENT 'セグメントID',
  `order_date` text NOT NULL COMMENT '受注日',
  `estimate_date` text NOT NULL COMMENT '最終見積日',
  `estimate_active_date` text NOT NULL COMMENT '見積有効日数',
  `consignment_yuan_id` tinyint(20) unsigned NOT NULL COMMENT '委託元ID',
  `responsibility_member_id` tinyint(20) unsigned NOT NULL COMMENT '責任者ID',
  `acceptance_plan_month` text NOT NULL COMMENT '検収予定月',
  `acceptance_month` text NOT NULL COMMENT '検収月',
  `acceptance_amount` text NOT NULL COMMENT '検収金額',
  `acceptance_tax_included` text NOT NULL COMMENT '税込金額',
  `cost_rate` bigint(20) NOT NULL DEFAULT '0' COMMENT '原価率',
  `profit_rate` bigint(20) NOT NULL DEFAULT '0' COMMENT '利益率',
  `projects_comment` text NOT NULL COMMENT '案件詳細コメント',
  `updated_at` datetime NOT NULL COMMENT 'レコード更新日時',
  `created_at` datetime NOT NULL COMMENT 'レコード作成日時',
  `del_flg` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0:有効、1:削除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE `partner_companys`;
CREATE TABLE `partner_companys` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `partner_company_name` varchar(255) NOT NULL COMMENT '委託会社名',
  `business_form_id` tinyint(20) unsigned NOT NULL COMMENT '個人/法人ID',
  `updated_at` datetime NOT NULL COMMENT 'レコード更新日時',
  `created_at` datetime NOT NULL COMMENT 'レコード作成日時',
  `del_flg` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0:有効、1:削除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE `partner_business_forms`;
CREATE TABLE `partner_business_forms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `business_form` text NOT NULL COMMENT '個人/法人',
  `updated_at` datetime NOT NULL COMMENT 'レコード更新日時',
  `created_at` datetime NOT NULL COMMENT 'レコード作成日時',
  `del_flg` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0:有効、1:削除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE `project_status`;
CREATE TABLE `project_status` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `status` text NOT NULL COMMENT 'ステータス',
  `updated_at` datetime NOT NULL COMMENT 'レコード更新日時',
  `created_at` datetime NOT NULL COMMENT 'レコード作成日時',
  `del_flg` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0:有効、1:削除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE `project_segments`;
CREATE TABLE `project_segments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `segment` text NOT NULL COMMENT 'セグメント',
  `updated_at` datetime NOT NULL COMMENT 'レコード更新日時',
  `created_at` datetime NOT NULL COMMENT 'レコード作成日時',
  `del_flg` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0:有効、1:削除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE `project_consignments`;
CREATE TABLE `project_consignments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `consignment_yuan` text NOT NULL COMMENT '委託元',
  `updated_at` datetime NOT NULL COMMENT 'レコード更新日時',
  `created_at` datetime NOT NULL COMMENT 'レコード作成日時',
  `del_flg` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0:有効、1:削除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE `project_members`;
CREATE TABLE `project_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `project_id` bigint(20) unsigned NOT NULL COMMENT 'プロジェクトID',
  `sales_member_id` bigint(20) unsigned NOT NULL COMMENT '営業担当者ID',
  `development_member_id` bigint(20) unsigned NOT NULL COMMENT '開発担当者ID',
  `development_member_role` text NOT NULL COMMENT '開発担当役割',
  `updated_at` datetime NOT NULL COMMENT 'レコード更新日時',
  `created_at` datetime NOT NULL COMMENT 'レコード作成日時',
  `del_flg` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:有効、1:削除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE `project_partners`;
CREATE TABLE `project_partners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `project_id` bigint(20) unsigned NOT NULL COMMENT 'プロジェクトID',
  `project_partner_id` bigint(20) unsigned NOT NULL COMMENT '委託会社ID',
  `partner_company_comment` text NOT NULL COMMENT '委託会社役割(コメント)',
  `consignment_amount` text NOT NULL COMMENT '委託料(原価)',
  `updated_at` datetime NOT NULL COMMENT 'レコード更新日時',
  `created_at` datetime NOT NULL COMMENT 'レコード作成日時',
  `del_flg` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0:有効、1:削除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE `project_comments`;
CREATE TABLE `project_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `comment` text NOT NULL COMMENT 'コメント内容',
  `project_id` bigint(20) unsigned NOT NULL COMMENT 'プロジェクトID',
  `comment_member_id` bigint(20) unsigned NOT NULL COMMENT 'コメントメンバーID',
  `updated_at` datetime NOT NULL COMMENT 'レコード更新日時',
  `created_at` datetime NOT NULL COMMENT 'レコード作成日時',
  `del_flg` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0:有効、1:削除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE `project_auto_comments`;
CREATE TABLE `project_auto_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `auto_comment` text NOT NULL COMMENT '自動コメント内容',
  `project_id` bigint(20) unsigned NOT NULL COMMENT 'プロジェクトID',
  `auto_comment_member_id` bigint(20) unsigned NOT NULL COMMENT '自動コメントメンバーID',
  `updated_at` datetime NOT NULL COMMENT 'レコード更新日時',
  `created_at` datetime NOT NULL COMMENT 'レコード作成日時',
  `del_flg` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0:有効、1:削除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE `estimates`;
CREATE TABLE `estimates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `project_id` bigint(20) unsigned NOT NULL COMMENT 'プロジェクトID',
  `orders_received` text NOT NULL COMMENT '受注先',
  `discount` bigint(20) NOT NULL DEFAULT '0' COMMENT 'お値引き',
  `delivery_time` text NOT NULL COMMENT '納期',
  `delivery_place` text NOT NULL COMMENT '納品場所',
  `payment_terms` text NOT NULL COMMENT '支払い条件',
  `remarks` text NOT NULL COMMENT '備考',
  `updated_at` datetime NOT NULL COMMENT 'レコード更新日時',
  `created_at` datetime NOT NULL COMMENT 'レコード作成日時',
  `del_flg` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0:有効、1:削除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE `estimate_items`;
CREATE TABLE `estimate_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `project_id` bigint(20) unsigned NOT NULL COMMENT 'プロジェクトID',
  `estimate_id` bigint(20) unsigned NOT NULL COMMENT '見積書ID',
  `estimate_item` text NOT NULL COMMENT '見積_項目',
  `estimate_quantity` bigint(20) unsigned NOT NULL COMMENT '見積_数量',
  `estimate_unit` text NOT NULL COMMENT '見積_単位',
  `estimate_amount` bigint(20) NOT NULL DEFAULT '0' COMMENT '見積_金額',
  `estimate_remarks` text NOT NULL COMMENT '見積_備考',
  `updated_at` datetime NOT NULL COMMENT 'レコード更新日時',
  `created_at` datetime NOT NULL COMMENT 'レコード作成日時',
  `del_flg` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0:有効、1:削除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE `estimate_conditions`;
CREATE TABLE `estimate_conditions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `project_id` bigint(20) unsigned NOT NULL COMMENT 'プロジェクトID',
  `estimate_id` bigint(20) unsigned NOT NULL COMMENT '見積書ID',
  `estimate_condition_remarks` text NOT NULL COMMENT '前提条件',
  `updated_at` datetime NOT NULL COMMENT 'レコード更新日時',
  `created_at` datetime NOT NULL COMMENT 'レコード作成日時',
  `del_flg` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0:有効、1:削除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE `bills`;
CREATE TABLE `bills` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `project_id` bigint(20) unsigned NOT NULL COMMENT 'プロジェクトID',
  `orders_received` text NOT NULL COMMENT '受注先',
  `estimate_content` text NOT NULL COMMENT 'お見積内容',
  `acceptance_date` text NOT NULL COMMENT '検収日',
  `payment_date` text NOT NULL COMMENT 'お支払い日',
  `discount` bigint(20) NOT NULL DEFAULT '0' COMMENT 'お値引き',
  `remarks` text NOT NULL COMMENT '備考',
  `updated_at` datetime NOT NULL COMMENT 'レコード更新日時',
  `created_at` datetime NOT NULL COMMENT 'レコード作成日時',
  `del_flg` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0:有効、1:削除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE `bill_items`;
CREATE TABLE `bill_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `project_id` bigint(20) unsigned NOT NULL COMMENT 'プロジェクトID',
  `bill_id` bigint(20) unsigned NOT NULL COMMENT '請求書ID',
  `bill_item` text NOT NULL COMMENT '請求_項目',
  `bill_quantity` bigint(20) unsigned NOT NULL COMMENT '請求_数量',
  `bill_unit` text NOT NULL COMMENT '請求_単位',
  `bill_unit_price` bigint(20) NOT NULL DEFAULT '0' COMMENT '請求_単価',
  `bill_amount` bigint(20) NOT NULL DEFAULT '0' COMMENT '請求_金額',
  `bill_remarks` text NOT NULL COMMENT '請求_備考',
  `updated_at` datetime NOT NULL COMMENT 'レコード更新日時',
  `created_at` datetime NOT NULL COMMENT 'レコード作成日時',
  `del_flg` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0:有効、1:削除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE `operation_history`;
CREATE TABLE `operation_history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `project_id` bigint(20) unsigned NOT NULL COMMENT 'プロジェクトID',
  `operation_member_id` bigint(20) unsigned NOT NULL COMMENT '操作メンバーID',
  `add_or_delete` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '追加/削除',
  `updated_at` datetime NOT NULL COMMENT 'レコード更新日時',
  `created_at` datetime NOT NULL COMMENT 'レコード作成日時',
  `del_flg` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0:有効、1:削除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- ================= テストメンバーデータ =================

-- 管理者
insert into members (`mail`, `password`, `last_name`, `first_name`,`updated_at`,`created_at`,`is_admin`) values ('k.okabe@ebisuinc.jp','098f6bcd4621d373cade4e832627b4f6','管理者','太郎',now(),now(),1);
-- メールアドレス k.okabe@ebisuinc.jp
-- パスワード test

-- 一般
insert into members (`mail`, `password`, `last_name`, `first_name`,`updated_at`,`created_at`,`is_admin`) values ('k.okabe1@ebisuinc.jp','098f6bcd4621d373cade4e832627b4f6','岡部','健志',now(),now(),1);
-- メールアドレス k.okabe1@ebisuinc.jp
-- パスワード test
insert into members (`mail`, `password`, `last_name`, `first_name`,`updated_at`,`created_at`,`is_admin`) values ('k.okabe2@ebisuinc.jp','098f6bcd4621d373cade4e832627b4f6','西川','信介',now(),now(),1);
-- メールアドレス k.okabe2@ebisuinc.jp
-- パスワード test
insert into members (`mail`, `password`, `last_name`, `first_name`,`updated_at`,`created_at`,`is_admin`) values ('k.okabe3@ebisuinc.jp','098f6bcd4621d373cade4e832627b4f6','小川','ともひろ',now(),now(),1);
-- メールアドレス k.okabe3@ebisuinc.jp
-- パスワード test
insert into members (`mail`, `password`, `last_name`, `first_name`,`updated_at`,`created_at`,`is_admin`) values ('k.okabe4@ebisuinc.jp','098f6bcd4621d373cade4e832627b4f6','美馬','一毅',now(),now(),1);
-- メールアドレス k.okabe4@ebisuinc.jp
-- パスワード test
-- ================= テストマスタデータ =================

-- ステータスマスタ
insert into project_status (`status`, `updated_at`,`created_at`,`del_flg`) values ('見積中', now(), now(), 0);
insert into project_status (`status`, `updated_at`,`created_at`,`del_flg`) values ('受注', now(), now(), 0);
insert into project_status (`status`, `updated_at`,`created_at`,`del_flg`) values ('失注', now(), now(), 0);
insert into project_status (`status`, `updated_at`,`created_at`,`del_flg`) values ('仕掛かり', now(), now(), 0);
insert into project_status (`status`, `updated_at`,`created_at`,`del_flg`) values ('検収', now(), now(), 0);
insert into project_status (`status`, `updated_at`,`created_at`,`del_flg`) values ('検収完了', now(), now(), 0);
insert into project_status (`status`, `updated_at`,`created_at`,`del_flg`) values ('終了', now(), now(), 0);

-- セグメントマスタ
insert into project_segments (`segment`, `updated_at`,`created_at`,`del_flg`) values ('受託', now(), now(), 0);
insert into project_segments (`segment`, `updated_at`,`created_at`,`del_flg`) values ('SES', now(), now(), 0);

-- 委託元マスタ
insert into project_consignments (`consignment_yuan`, `updated_at`,`created_at`,`del_flg`) values ('テスト1委託元会社', now(), now(), 0);
insert into project_consignments (`consignment_yuan`, `updated_at`,`created_at`,`del_flg`) values ('テスト2委託元会社', now(), now(), 0);
insert into project_consignments (`consignment_yuan`, `updated_at`,`created_at`,`del_flg`) values ('テスト3委託元会社', now(), now(), 0);

-- 委託会社ビジネスフォームマスタ
insert into project_business_forms (`business_form`, `updated_at`,`created_at`,`del_flg`) values ('個人', now(), now(), 0);
insert into project_business_forms (`business_form`, `updated_at`,`created_at`,`del_flg`) values ('法人', now(), now(), 0);

-- 委託会社マスタ
insert into partner_companys (`partner_company_name`, `business_form_id`, `updated_at`,`created_at`,`del_flg`) values ('プログラム株式会社', '1', now(), now(), 0);
insert into partner_companys (`partner_company_name`, `business_form_id`, `updated_at`,`created_at`,`del_flg`) values ('デザイン株式会社', '2', now(), now(), 0);
insert into partner_companys (`partner_company_name`, `business_form_id`, `updated_at`,`created_at`,`del_flg`) values ('ディレクション株式会社', '1', now(), now(), 0);
insert into partner_companys (`partner_company_name`, `business_form_id`, `updated_at`,`created_at`,`del_flg`) values ('テスト評価株式会社', '2', now(), now(), 0);

-- 委託会社形態マスタ
insert into partner_business_forms (`business_form`, `updated_at`,`created_at`,`del_flg`) values ('個人', now(), now(), 0);
insert into partner_business_forms (`business_form`, `updated_at`,`created_at`,`del_flg`) values ('法人', now(), now(), 0);

-- ================= テスト案件データ =================


-- テスト案件1　------------------------
insert into projects (`project_content`, `status_id`, `segment_id`, `order_date`, `estimate_date`, `estimate_active_date`, `consignment_yuan_id`, `responsibility_member_id`, `acceptance_plan_month`, `acceptance_month`, `acceptance_amount`, `acceptance_tax_included`, `cost_rate`, `profit_rate`, `projects_comment`, `updated_at`,`created_at`,`del_flg`) values ('案件管理システム', 1, 1, now(), now(), now(), 1, 1, now(), now(), 100, 108, 10, 90, '営業管理システムの開発案件です。', now(), now(), 0);

-- テスト案件1_営業/開発担当
insert into project_members (`project_id`, `sales_member_id`, `development_member_id`, `development_member_role`, `updated_at`,`created_at`,`del_flg`) values ('1', '2', '3', 'プログラム', now(), now(), 0);

-- テスト案件1_担当委託会社
insert into project_partners (`project_id`, `project_partner_id`, `partner_company_comment`, `consignment_amount`, `updated_at`,`created_at`,`del_flg`) values ('1', '2', 'プログラマー', '10', now(), now(), 0);

-- テスト案件2　------------------------
insert into projects (`project_content`, `status_id`, `segment_id`, `order_date`, `estimate_date`, `estimate_active_date`, `consignment_yuan_id`, `responsibility_member_id`, `acceptance_plan_month`, `acceptance_month`, `acceptance_amount`, `acceptance_tax_included`, `cost_rate`, `profit_rate`, `projects_comment`, `updated_at`,`created_at`,`del_flg`) values ('人事情報システム', 2, 2, now(), now(), now(), 2, 2, now(), now(), 100, 108, 10, 90, '人事情報システムの開発案件です。', now(), now(), 0);

-- テスト案件2_営業/開発担当
insert into project_members (`project_id`, `sales_member_id`, `development_member_id`, `development_member_role`, `updated_at`,`created_at`,`del_flg`) values ('2', '3', '4', 'デザイン', now(), now(), 0);

-- テスト案件2_担当委託会社
insert into project_partners (`project_id`, `project_partner_id`, `partner_company_comment`, `consignment_amount`, `updated_at`,`created_at`,`del_flg`) values ('2', '3', 'デザイナー', '10', now(), now(), 0);

-- テスト案件3　------------------------
insert into projects (`project_content`, `status_id`, `segment_id`, `order_date`, `estimate_date`, `estimate_active_date`, `consignment_yuan_id`, `responsibility_member_id`, `acceptance_plan_month`, `acceptance_month`, `acceptance_amount`, `acceptance_tax_included`, `cost_rate`, `profit_rate`, `projects_comment`, `updated_at`,`created_at`,`del_flg`) values ('ワークフローシステム', 3, 1, now(), now(), now(), 3, 3, now(), now(), 100, 108, 10, 90, 'ワークフローシステムの開発案件です。', now(), now(), 0);

-- テスト案件3_営業/開発担当
insert into project_members (`project_id`, `sales_member_id`, `development_member_id`, `development_member_role`, `updated_at`,`created_at`,`del_flg`) values ('3', '4', '5', '設計', now(), now(), 0);

-- テスト案件3_担当委託会社
insert into project_partners (`project_id`, `project_partner_id`, `partner_company_comment`, `consignment_amount`, `updated_at`,`created_at`,`del_flg`) values ('3', '4', 'ディレクション', '10', now(), now(), 0);

-- テスト案件4　------------------------
insert into projects (`project_content`, `status_id`, `segment_id`, `order_date`, `estimate_date`, `estimate_active_date`, `consignment_yuan_id`, `responsibility_member_id`, `acceptance_plan_month`, `acceptance_month`, `acceptance_amount`, `acceptance_tax_included`, `cost_rate`, `profit_rate`, `projects_comment`, `updated_at`,`created_at`,`del_flg`) values ('就業システム', 4, 2, now(), now(), now(), 1, 4, now(), now(), 100, 108, 10, 90, '就業システムの開発案件です。', now(), now(), 0);

-- テスト案件4_営業/開発担当
insert into project_members (`project_id`, `sales_member_id`, `development_member_id`, `development_member_role`, `updated_at`,`created_at`,`del_flg`) values ('4', '5', '1', 'テスト', now(), now(), 0);

-- テスト案件4_担当委託会社
insert into project_partners (`project_id`, `project_partner_id`, `partner_company_comment`, `consignment_amount`, `updated_at`,`created_at`,`del_flg`) values ('4', '1', 'テスト評価', '10', now(), now(), 0);

-- テスト案件5　------------------------
insert into projects (`project_content`, `status_id`, `segment_id`, `order_date`, `estimate_date`, `estimate_active_date`, `consignment_yuan_id`, `responsibility_member_id`, `acceptance_plan_month`, `acceptance_month`, `acceptance_amount`, `acceptance_tax_included`, `cost_rate`, `profit_rate`, `projects_comment`, `updated_at`,`created_at`,`del_flg`) values ('年末調整申告システム', 5, 1, now(), now(), now(), 2, 5, now(), now(), 100, 108, 10, 90, '年末調整申告システムの開発案件です。', now(), now(), 0);

-- テスト案件5_営業/開発担当
insert into project_members (`project_id`, `sales_member_id`, `development_member_id`, `development_member_role`, `updated_at`,`created_at`,`del_flg`) values ('5', '1', '2', 'ディレクション', now(), now(), 0);

-- テスト案件5_担当委託会社
insert into project_partners (`project_id`, `project_partner_id`, `partner_company_comment`, `consignment_amount`, `updated_at`,`created_at`,`del_flg`) values ('5', '2', 'プログラム', '10', now(), now(), 0);

-- テスト案件6　------------------------
insert into projects (`project_content`, `status_id`, `segment_id`, `order_date`, `estimate_date`, `estimate_active_date`, `consignment_yuan_id`, `responsibility_member_id`, `acceptance_plan_month`, `acceptance_month`, `acceptance_amount`, `acceptance_tax_included`, `cost_rate`, `profit_rate`, `projects_comment`, `updated_at`,`created_at`,`del_flg`) values ('給与明細配信システム', 6, 2, now(), now(), now(), 3, 1, now(), now(), 100, 108, 10, 90, '給与明細配信システムの開発案件です。', now(), now(), 0);

-- テスト案件6_営業/開発担当
insert into project_members (`project_id`, `sales_member_id`, `development_member_id`, `development_member_role`, `updated_at`,`created_at`,`del_flg`) values ('6', '2', '3', 'プログラム', now(), now(), 0);

-- テスト案件6_担当委託会社
insert into project_partners (`project_id`, `project_partner_id`, `partner_company_comment`, `consignment_amount`, `updated_at`,`created_at`,`del_flg`) values ('6', '3', 'デザイン', '10', now(), now(), 0);

-- テスト案件7　------------------------
insert into projects (`project_content`, `status_id`, `segment_id`, `order_date`, `estimate_date`, `estimate_active_date`, `consignment_yuan_id`, `responsibility_member_id`, `acceptance_plan_month`, `acceptance_month`, `acceptance_amount`, `acceptance_tax_included`, `cost_rate`, `profit_rate`, `projects_comment`, `updated_at`,`created_at`,`del_flg`) values ('販売指南システム', 7, 1, now(), now(), now(), 1, 2, now(), now(), 100, 108, 10, 90, '販売指南システムの開発案件です。', now(), now(), 0);

-- テスト案件7_営業/開発担当
insert into project_members (`project_id`, `sales_member_id`, `development_member_id`, `development_member_role`, `updated_at`,`created_at`,`del_flg`) values ('7', '3', '4', 'デザイン', now(), now(), 0);

-- テスト案件7_担当委託会社
insert into project_partners (`project_id`, `project_partner_id`, `partner_company_comment`, `consignment_amount`, `updated_at`,`created_at`,`del_flg`) values ('7', '4', 'ディレクション', '10', now(), now(), 0);

-- テスト案件8　------------------------
insert into projects (`project_content`, `status_id`, `segment_id`, `order_date`, `estimate_date`, `estimate_active_date`, `consignment_yuan_id`, `responsibility_member_id`, `acceptance_plan_month`, `acceptance_month`, `acceptance_amount`, `acceptance_tax_included`, `cost_rate`, `profit_rate`, `projects_comment`, `updated_at`,`created_at`,`del_flg`) values ('会計指南システム', 1, 2, now(), now(), now(), 2, 3, now(), now(), 100, 108, 10, 90, '会計指南システムの開発案件です。', now(), now(), 0);

-- テスト案件8_営業/開発担当
insert into project_members (`project_id`, `sales_member_id`, `development_member_id`, `development_member_role`, `updated_at`,`created_at`,`del_flg`) values ('8', '4', '5', '設計', now(), now(), 0);

-- テスト案件8_担当委託会社
insert into project_partners (`project_id`, `project_partner_id`, `partner_company_comment`, `consignment_amount`, `updated_at`,`created_at`,`del_flg`) values ('8', '1', 'テスト評価', '10', now(), now(), 0);

-- テスト案件9　------------------------
insert into projects (`project_content`, `status_id`, `segment_id`, `order_date`, `estimate_date`, `estimate_active_date`, `consignment_yuan_id`, `responsibility_member_id`, `acceptance_plan_month`, `acceptance_month`, `acceptance_amount`, `acceptance_tax_included`, `cost_rate`, `profit_rate`, `projects_comment`, `updated_at`,`created_at`,`del_flg`) values ('利益管理システム', 2, 1, now(), now(), now(), 3, 4, now(), now(), 100, 108, 10, 90, '利益管理システムの開発案件です。', now(), now(), 0);

-- テスト案件9_営業/開発担当
insert into project_members (`project_id`, `sales_member_id`, `development_member_id`, `development_member_role`, `updated_at`,`created_at`,`del_flg`) values ('9', '5', '1', 'テスト', now(), now(), 0);

-- テスト案件9_担当委託会社
insert into project_partners (`project_id`, `project_partner_id`, `partner_company_comment`, `consignment_amount`, `updated_at`,`created_at`,`del_flg`) values ('9', '2', 'プログラム', '10', now(), now(), 0);

-- テスト案件10　------------------------
insert into projects (`project_content`, `status_id`, `segment_id`, `order_date`, `estimate_date`, `estimate_active_date`, `consignment_yuan_id`, `responsibility_member_id`, `acceptance_plan_month`, `acceptance_month`, `acceptance_amount`, `acceptance_tax_included`, `cost_rate`, `profit_rate`, `projects_comment`, `updated_at`,`created_at`,`del_flg`) values ('食堂精算システム', 3, 2, now(), now(), now(), 1, 5, now(), now(), 100, 108, 10, 90, '食堂精算システムの開発案件です。', now(), now(), 0);

-- テスト案件10_営業/開発担当
insert into project_members (`project_id`, `sales_member_id`, `development_member_id`, `development_member_role`, `updated_at`,`created_at`,`del_flg`) values ('10', '1', '2', 'ディレクション', now(), now(), 0);

-- テスト案件10_担当委託会社
insert into project_partners (`project_id`, `project_partner_id`, `partner_company_comment`, `consignment_amount`, `updated_at`,`created_at`,`del_flg`) values ('10', '3', 'デザイン', '10', now(), now(), 0);

-- テスト案件11　------------------------
insert into projects (`project_content`, `status_id`, `segment_id`, `order_date`, `estimate_date`, `estimate_active_date`, `consignment_yuan_id`, `responsibility_member_id`, `acceptance_plan_month`, `acceptance_month`, `acceptance_amount`, `acceptance_tax_included`, `cost_rate`, `profit_rate`, `projects_comment`, `updated_at`,`created_at`,`del_flg`) values ('営業支援システム', 4, 1, now(), now(), now(), 2, 1, now(), now(), 100, 108, 10, 90, '営業支援システムの開発案件です。', now(), now(), 0);

-- テスト案件11_営業/開発担当
insert into project_members (`project_id`, `sales_member_id`, `development_member_id`, `development_member_role`, `updated_at`,`created_at`,`del_flg`) values ('11', '1', '3', 'プログラム', now(), now(), 0);

-- テスト案件11_担当委託会社
insert into project_partners (`project_id`, `project_partner_id`, `partner_company_comment`, `consignment_amount`, `updated_at`,`created_at`,`del_flg`) values ('11', '4', 'ディレクション', '10', now(), now(), 0);



