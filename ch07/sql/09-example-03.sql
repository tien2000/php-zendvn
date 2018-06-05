-- 01. Tìm tổng kinh phí của tất cả các công trình theo từng chủ thầu
SELECT contractor.name, SUM(cost)
FROM building, contractor
WHERE building.contractor_id = contractor.id
GROUP BY contractor_id;


-- 02. cho biết họ tên các kiến trúc sư có tổng thù lao thiết kế các công trình lớn hơn 25 triệu
SELECT name, SUM(benefit) AS total
FROM design, architect
WHERE design.architect_id = architect.id
GROUP BY architect_id
HAVING total > 25;


-- 03. Cho biết số lượng các KTS có tổng thù lao thiết kế các công trình lớn hơn 25 triệu
SELECT COUNT(temp3.name)
FROM (
	SELECT name, SUM(benefit) AS total
	FROM design, architect
	WHERE design.architect_id = architect.id
	GROUP BY architect_id
	HAVING total > 25
) AS temp3;


-- 04. Tìm tổng số công nhân đã tham gia ở mỗi công trình.
SELECT building.id, building.name, building.address, COUNT(worker_id) AS total
FROM building, work
WHERE building.id = work.building_id
GROUP BY building_id;


-- 05. Tìm tên và địa chỉ công trình có tổng số công nhân tham gia nhiều nhất.
SELECT building.id, building.name, building.address, COUNT(worker_id) AS total_worker
FROM building, work
WHERE building.id = work.building_id
GROUP BY building_id
ORDER BY total_worker DESC
LIMIT 0,1;


-- 06. Cho biết tên các thành phố và kink phí trung bình cho mỗi công trình của từng thành phố tương ứng.
SELECT city, AVG(cost)
FROM building
GROUP BY city;


-- 07. Cho biết họ tên các công nhân có tổng số ngày tham gia vào các công trình lớn hơn tổng số ngày 
-- tham gia của công nhân Nguyen Hong Van.
SELECT name, SUM(total) AS tong_ngay
FROM work, worker
WHERE work.worker_id = worker.id
GROUP BY work.worker_id
HAVING tong_ngay > (
	SELECT SUM(total)
	FROM work, worker
	WHERE work.worker_id = worker.id
	AND worker.name = 'nguyen hong van'
	GROUP BY work.worker_id
);


-- 08. Cho biết tổng số công trình mà mỗi chủ thầu đã thi công tại mỗi thành phố.
SELECT contractor.name, city, COUNT(building.id)
FROM building, contractor
WHERE building.contractor_id = contractor.id
GROUP BY contractor_id, city;


-- 09. Cho biết họ tên công nhân có tham gia ở tất cả các công trình
SELECT name, COUNT(building_id) AS tong_cong_trinh
FROM work, worker
WHERE work.worker_id = worker.id
GROUP BY worker_id
HAVING tong_cong_trinh = (
	SELECT COUNT(id)
	FROM building
);



