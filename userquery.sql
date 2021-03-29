--delete from m_users where nik='1'
delete from m_users where id=157
update m_users set id=2 where nik='11111' departemen='D003',jabatan='J005'  
--SELECT count(*) FROM m_users
SELECT * FROM m_cabang
SELECT * FROM m_level
SELECT * FROM m_departemen
SELECT * FROM m_jabatan
SELECT * FROM m_users a 
			LEFT JOIN m_cabang b ON a.kode_cabang = b.kode_cabang  
			LEFT JOIN m_departemen c ON c.id_dept=a.departemen  
			LEFT JOIN m_jabatan d ON d.id_jabatan=a.jabatan
			LEFT JOIN m_level e ON e.id_departemen =c.id_dept and  e.id_jabatan=d.id_jabatan and e.id_cabang = b.kode_cabang  