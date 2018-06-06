-- 01. INSERT

-- 01. 1 - Insert đầy đủ thông tin 
INSERT INTO contractor VALUES('5', 'Tien LS', 123321, 'SaiGon');


-- 01. 2 - Insert không đầy đủ thông tin 
INSERT INTO contractor(name, address, phone) VALUES('NeoTien', 'GiaDinh', 456654);


-- 01. 3 - Insert nhiều dòng
INSERT INTO contractor VALUES
	('7', 'Tien Le 1', 123321, 'SaiGon'),
    ('8', 'Tien Le 1', 456654, 'SaiGon - Gia Dinh');


-- 02. UPDATE
UPDATE contractor
SET name = 'Tien Le 2'
WHERE id = '8';


-- 03. DELETE
DELETE FROM contractor
WHERE id = '7';


