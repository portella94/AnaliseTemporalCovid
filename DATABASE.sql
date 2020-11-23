CREATE DATABASE covid;
USE covid;
CREATE TABLE leito_ocupacao
(
    estadoSigla VARCHAR ( 2 ),
    municipio VARCHAR(255),
    altas INT DEFAULT 0,
    obitos INT DEFAULT 0,
    SysStartTime DATETIME2 GENERATED ALWAYS AS ROW START NOT NULL,
    SysEndTime DATETIME2 GENERATED ALWAYS AS ROW
        END NOT NULL,
    PERIOD FOR SYSTEM_TIME ( SysStartTime, SysEndTime ),
    PRIMARY KEY ( estadoSigla,municipio )
) WITH ( SYSTEM_VERSIONING = ON );


CREATE TABLE leito_ocupacao_full
(
    ID BIGINT UNIQUE NOT NULL,
    estado TEXT,
    estadoSigla VARCHAR ( 2 ),
    municipio TEXT,
    cnes BIGINT UNIQUE,
    nomeCnes TEXT,
    dataNotificacaoOcupacao DATE,
    ofertaRespiradores INT,
    ofertaHospCli INT,
    ofertaHospUti INT,
    ofertaSRAGCli INT,
    ofertaSRAGUti INT,
    ocupHospCli INT,
    ocupHospUti INT,
    ocupSRAGCli INT,
    ocupSRAGUti INT,
    altas INT,
    obitos INT,
    ocupacaoInformada BOOLEAN,
    algumaOcupacaoInformada BOOLEAN
);
