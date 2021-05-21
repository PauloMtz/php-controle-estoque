CREATE TABLE `itens` (
  `id_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `codigo_erp` varchar(10) NOT NULL,
  `part_number` varchar(65) DEFAULT NULL,
  `fabricante` varchar(65) DEFAULT NULL,
  `maquina` varchar(30) DEFAULT NULL,
  `dimensoes` varchar(65) DEFAULT NULL,
  `posicao_almox` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `entrada_item` (
  `id_entrada` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `fornecedor` varchar(65) DEFAULT NULL,
  `contrato` varchar(20) DEFAULT NULL,
  `quantidade` int(5) CHECK (`quantidade` > 0),
  `valor_total` double(9,2) DEFAULT NULL,
  `custo_unitario` double(6,2) DEFAULT NULL,
  `data_recebimento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (item_id) REFERENCES itens (id_item)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `saida_item` (
  `id_saida` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `solicitante` varchar(65) DEFAULT NULL,
  `quantidade` int(5) CHECK (`quantidade` > 0),
  `finalidade` varchar(10) DEFAULT NULL,
  `valor_total` double(9,2) DEFAULT NULL,
  `custo_unitario` double(6,2) DEFAULT NULL,
  `observacao` text,
  `data_saida` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (item_id) REFERENCES itens (id_item)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `estoque` (
  `id_estoque` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `quantidade` int(11) CHECK (`quantidade` > 0),
  `custo_unitario` double(6,2) DEFAULT NULL,
  `valor_total` double(9,2) DEFAULT NULL,
  FOREIGN KEY (item_id) REFERENCES itens (id_item)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(65) NOT NULL,
  `matricula` varchar(20) NOT NULL UNIQUE,
  `email` varchar(65) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `perfil` varchar(20) DEFAULT NULL,
  `ativo` boolean DEFAULT TRUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# stored procedure para atualizar estoque após adicionar item
DELIMITER $$
CREATE PROCEDURE `SP_AtualizaEstoque` ( `item` int, `qtde` int, `total_item` decimal(9,2), `custo_unitario` decimal(6,2))
BEGIN 
declare contador int(11);
SELECT count(*) into contador FROM estoque WHERE item_id = item;
IF contador > 0 THEN 
UPDATE estoque SET quantidade = quantidade + qtde, valor_total = valor_total + total_item, custo_unitario = COALESCE(valor_total / NULLIF(quantidade, 0), 0) WHERE item_id = item;
ELSE
INSERT INTO estoque (item_id, quantidade, valor_total, custo_unitario) values (item, qtde, total_item, custo_unitario); 
END IF; 
END $$ 
DELIMITER ;

# trigger que chama a stored procedure para atualizar banco
DELIMITER $$ 
CREATE TRIGGER `TRG_EntradaItem_AI` AFTER INSERT ON `entrada_item` 
FOR EACH ROW 
BEGIN 
CALL SP_AtualizaEstoque (new.item_id, new.quantidade, new.valor_total, new.custo_unitario); 
END $$ 
DELIMITER ;

# trigger que chama a stored procedure para atualizar banco
DELIMITER $$
CREATE TRIGGER `TRG_SaidaItem_AI` AFTER INSERT ON `saida_item` 
FOR EACH ROW 
BEGIN 
CALL SP_AtualizaEstoque (new.item_id, new.quantidade * -1, new.valor_total * -1, new.custo_unitario); 
END $$ 
DELIMITER ;

# inserções
INSERT INTO `usuarios` VALUES 
  (1,'RIBAMAR DE SOUZA','2323423','ribamar@email.com','202cb962ac59075b964b07152d234b70','admin',1),
  (2,'PEDRO TESTE','112233','pedro@email.teste','202cb962ac59075b964b07152d234b70','user',0),
  (3,'MARIA RITA','332211','maria.rita@email.teste','202cb962ac59075b964b07152d234b70','user',1),
  (4,'BÁRBARA SILVA','443322','barbara@email.teste','202cb962ac59075b964b07152d234b70','user',0);

INSERT INTO `itens` VALUES 
  (1,'CORREIA PLANA','TC0049','AS-004-BD-77-MM','NPI','DBCS','12x123x2345','21.B.08'),
  (2,'CORREIA REDONDA','TC0081','12-FF-03-XX','TESTE','OVIS','12x10x189','21.C.07'),
  (3,'ROLAMENTO Z6204','TR0040','XX-Z09-BG-34','WEG','Crisplant','','22.C.09'),
  (4,'PARAFUSO M10','M1100','AA-11-BB-CC','TESTE','Crossbelt','10mm','22.X.8');

INSERT INTO `entrada_item` VALUES 
  (1,1,'SPM','00-00-2021',13,100.00,7.69,'2021-05-10 13:39:29'),
  (2,1,'SPM','00-00-2021',5,50.00,10.00,'2021-05-10 13:43:07'),
  (3,1,'SPM','00-00-2021',5,50.00,10.00,'2021-05-10 13:43:57'),
  (7,3,'SPM','00-00-2021',5,100.00,20.00,'2021-05-10 15:16:06'),
  (6,2,'SPM','00-00-2021',13,100.00,7.69,'2021-05-10 13:51:28'),
  (8,3,'SPM','00-00-2021',5,100.00,20.00,'2021-05-10 15:16:55'),
  (9,4,'SPM','00-00-2021',13,100.00,7.69,'2021-05-10 15:17:19'),
  (10,3,'ABC','2021-00-02',5,70.00,14.00,'2021-05-12 13:50:20'),
  (11,5,'ABC','2021-00-02',13,100.00,7.69,'2021-05-13 12:21:32'),
  (12,6,'XPTO','2021-01-00',5,100.00,20.00,'2021-05-13 12:22:48');

INSERT INTO `saida_item` VALUES 
  (1,1,'TESTE',3,'os',23.07,7.69,'','2021-05-10 13:39:51'),
  (2,1,'TESTE',2,'transf',24.62,12.31,'','2021-05-10 13:41:37'),
  (3,1,'TESTE',8,'os',98.48,12.31,'','2021-05-10 13:42:40'),
  (4,1,'TESTE',1,'os',10.00,10.00,'OS 112233','2021-05-10 13:45:15'),
  (5,3,'TESTE',5,'transf',100.00,20.00,'','2021-05-10 15:16:29'),
  (6,3,'JOSÉ TESTE',1,'manut',20.00,20.00,'TESTANDO SAÃÍDA DE MATERIAIS','2021-05-12 13:31:31'),
  (7,5,'MARIA RITA',1,'os',7.69,7.69,'OS 221133','2021-05-13 12:36:48'),
  (8,6,'MARIA RITA',1,'os',20.00,20.00,'OS 221133','2021-05-13 12:39:07'),
  (9,3,'RIBAMAR DE SOUZA',1,'os',16.67,16.67,'OS 221134','2021-05-13 12:41:25');
