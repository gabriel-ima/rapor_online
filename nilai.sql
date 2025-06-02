CREATE TABLE nilai (
    id INT AUTO_INCREMENT PRIMARY KEY,
    siswa_id INT NOT NULL,
    guru_id INT NOT NULL,
    mapel VARCHAR(100),
    nilai_intra INT,
    nilai_ekstra INT,
    rata_rata FLOAT,
    predikat CHAR(1),
    deskripsi TEXT,
    sikap_spiritual TEXT,
    sikap_sosial TEXT,
    semester VARCHAR(10),
    tahun_ajaran VARCHAR(20),
    FOREIGN KEY (siswa_id) REFERENCES users(id),
    FOREIGN KEY (guru_id) REFERENCES users(id)
);
