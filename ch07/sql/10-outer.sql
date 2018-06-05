-- Outer Join
-- C1
SELECT architect.name, SUM(benefit) AS tong
FROM architect, design
WHERE architect.id = design.architect_id
GROUP BY design.architect_id;

-- C2
SELECT architect.name, SUM(benefit) AS tong
FROM architect JOIN design ON architect.id = design.architect_id
GROUP BY design.architect_id;

-- C3
SELECT architect.name, SUM(benefit) AS tong
FROM architect LEFT JOIN design ON architect.id = design.architect_id
GROUP BY design.architect_id;

-- C4
SELECT architect.name, SUM(benefit) AS tong
FROM design RIGHT JOIN architect ON architect.id = design.architect_id
GROUP BY design.architect_id;