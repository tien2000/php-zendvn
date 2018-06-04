-- 01. Hiễn thị thù lao trung bình của các KTS
SELECT architect_id, AVG(benefit) AS thu_lao_trung_binh
FROM design
GROUP BY architect_id;

-- 02. Hiển thị chi phí đầu tư cho các công trình ở mỗi thành phố
SELECT * FROM building;
SELECT city, SUM(cost) AS tong_chi_phi
FROM building
GROUP BY city;

-- 03. Tìm các công trình có chi phí trả cho KTS lớn hơn 50
SELECT * FROM design;
SELECT building_id, SUM(benefit) AS total
FROM design
GROUP BY building_id
HAVING total > 50;

-- 04. Tìm các TP có ít nhất 2 KTS tốt nghiệp
SELECT * FROM architect;
SELECT place, COUNT(id) AS total
FROM architect
GROUP BY place
HAVING total >= 2;



