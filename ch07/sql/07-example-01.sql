-- 01. Hãy cho biết tên và địa chỉ công trình do chủ thầu Cty xây dựng số 6 thi công
SELECT b.name, b.address
FROM building AS b, contractor AS c
WHERE b.contractor_id = c.id
AND c.name = 'cty xd so 6';

-- 02. Tìm tên và địa chỉ liên lạc của các chủ thầu (contractor) thi công công trình ở Cần Thơ (building)
-- do KTS Lê Kim Dung thiết kế (architect, design)
SELECT c.name, c.address
FROM architect AS a, building AS b, contractor AS c, design AS d
WHERE b.contractor_id = c.id
AND b.id= d.building_id
AND d.architect_id = a.id
AND b.city = 'can tho'
AND a.name = 'le kim dung';


-- 03. Hãy cho biết nơi tốt nghiệp của các KTS (architect) đã thiết kế (design)
-- công trình Khách sạn Quốc Tế Cần Thơ (building).
SELECT a.place
FROM architect AS a, building AS b, design AS d
WHERE b.id = d.building_id
AND d.architect_id = a.id
AND b.name = 'khach san quoc te'
AND b.city = 'can tho';

-- 04. Cho biết Tên, Năm Sinh, Nàm vào nghề của các công nhân (worker) có chuyên môn hàn hoặc điện (worker) đã tham gia các công trình (building)
-- mà chủ thầu Lê Văn Sơn (contractor) đã trúng thầu.
SELECT wk.name, wk.birthday, wk.year
FROM building AS b, contractor AS c, work AS w, worker AS wk
WHERE b.id = w.building_id
AND b.contractor_id = c.id
AND w.worker_id = wk.id
AND (wk.skill = 'han' OR wk.skill = 'dien')
AND c.name = 'le van son';

-- 05. Những công nhân (worker) nào đã bắt đầu tham gia công trình (building) Khách sạn Quốc Tế Cần Thơ trong giai đoạn từ 
-- 15/12/1994 đến 31/12 1994 (work) số ngày tương ứng.
SELECT wk.name, w.total
FROM building AS b , work AS w, worker AS wk
WHERE b.id = w.building_id
AND wk.id = w.worker_id
AND b.name = 'khach san quoc te'
AND b.city = 'can tho'
AND w.date BETWEEN '1994/12/15' AND '1994/12/31';

-- 06. Cho biết họ tên và năm sinh của các KTS (architect) đã tốt nghiệp ở TPHCM (architect) và đã thiết kế (design) 
-- ít nhất 1 công trình (building) có kinh phí đầu tư trên 400 triệu đồng.
SELECT DISTINCT a.name, a.birthday
FROM architect AS a, building AS b, design AS d
WHERE a.id = d.architect_id
AND b.id = d.building_id
AND b.cost > 400
AND a.place = 'can tho';


