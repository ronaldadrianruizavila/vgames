--PAQUETES--

--LOGIN--

CREATE OR REPLACE PACKAGE PK_LOGUIN
AS
       FUNCTION VERIFICAR_TIPO_USUARIO(CORREOA PERSONA.CORREO%TYPE, CONTRASENIAA PERSONA.CONTRASEŅA%TYPE) RETURN VARCHAR2;
       FUNCTION DEVOLVER_USER(CORREO PERSONA.CORREO%TYPE, CONTRASENIA PERSONA.CONTRASEŅA%TYPE) RETURN VARCHAR2;
END PK_LOGUIN;
/
CREATE OR REPLACE PACKAGE BODY PK_LOGUIN AS
       
       --VERIFICA EL TIPO DE USUARIO--
       FUNCTION VERIFICAR_TIPO_USUARIO(CORREOA PERSONA.CORREO%TYPE , CONTRASENIAA PERSONA.CONTRASEŅA%TYPE) 
       RETURN VARCHAR2 IS
       TIPO_USER TIPOUSUARIO.TIPO%TYPE;
       BEGIN
              SELECT (SELECT TIPO FROM TIPOUSUARIO TIP_USU WHERE TIP_USU.IDTIPOUSUARIO = PERS.IDTIPOUSUARIO ) AS NOMBRE  INTO TIPO_USER
              FROM PERSONA PERS WHERE PERS.CORREO = CORREOA;
                           
              RETURN TIPO_USER;
      EXCEPTION
              WHEN OTHERS THEN
              RETURN 'USUARIO NO REGISTRADO' ;
      END VERIFICAR_TIPO_USUARIO;
      
      --DEVUELVE LA PERSONA--
       FUNCTION DEVOLVER_USER(CORREO PERSONA.CORREO%TYPE , CONTRASENIA PERSONA.CONTRASEŅA%TYPE) 
       RETURN VARCHAR2 IS
       IS_USER TIPOUSUARIO.TIPO%TYPE;
       BEGIN
               IS_USER:= VERIFICAR_TIPO_USUARIO(CORREO,CONTRASENIA);
               
             IF IS_USER IS NULL THEN
                RETURN 'USUARIO NO REGISTRADO';
             ELSE 
               RETURN 'USUARIO REGISTRADO';
             END IF;
            
                          
      EXCEPTION
              WHEN OTHERS THEN
              RETURN 'USUARIO NO REGISTRADO' ;
      END DEVOLVER_USER;
      
END PK_LOGUIN;
/

BEGIN
   DBMS_OUTPUT.put_line(PK_LOGUIN.DEVOLVER_USER('RONALD@GMAIL.COM','123'));
END; 

BEGIN
   DBMS_OUTPUT.put_line(PK_LOGUIN.VERIFICAR_TIPO_USUARIO('RONA@GMAIL.COM','123'));
END;     
-- FINAL LOGIN

--SALAS--

CREATE OR REPLACE PACKAGE PK_SALAS AS 
       PROCEDURE INSERTSALA(NOMBRE VARCHAR2,SESION NUMBER);
       PROCEDURE UPDATESALA(IDE NUMBER,ESTADOUP VARCHAR2, NOMBREUP VARCHAR2);
       PROCEDURE DELETESALA(IDD NUMBER);
END PK_SALAS;
/
CREATE OR REPLACE PACKAGE BODY PK_SALAS AS
        PROCEDURE INSERTSALA(NOMBRE VARCHAR2, SESION NUMBER) IS 
        BEGIN 
             INSERT INTO SALAS (ID,NOMBRE,ESTADO,CREATED_AT) VALUES(SALAS_ID_SEQ.NEXTVAL,NOMBRE,'A',TO_DATE(TO_CHAR(SYSDATE,'yyyy-mm-dd hh24:mi:ss'),'yyyy-mm-dd hh24:mi:ss'));              
              IF SESION = 1 THEN 
                INSERT INTO SESIONS (ID,NOMBRE,SALA_ID,HORA_INICIO,HORA_FIN,CREATED_AT) VALUES (SESIONS_ID_SEQ.NEXTVAL,NOMBRE||'-M',SALAS_ID_SEQ.CURRVAL,'09:00:00','12:00:00',TO_DATE(TO_CHAR(SYSDATE,'yyyy-mm-dd hh24:mi:ss'),'yyyy-mm-dd hh24:mi:ss'));
                END IF;
              IF SESION = 2 THEN 
                INSERT INTO SESIONS (ID,NOMBRE,SALA_ID,HORA_INICIO,HORA_FIN,CREATED_AT) VALUES (SESIONS_ID_SEQ.NEXTVAL,NOMBRE||'-V',SALAS_ID_SEQ.CURRVAL,'13:00:00','16:00:00',TO_DATE(TO_CHAR(SYSDATE,'yyyy-mm-dd hh24:mi:ss'),'yyyy-mm-dd hh24:mi:ss'));
                END IF;
              IF SESION = 3 THEN 
                INSERT INTO SESIONS (ID,NOMBRE,SALA_ID,HORA_INICIO,HORA_FIN,CREATED_AT) VALUES (SESIONS_ID_SEQ.NEXTVAL,NOMBRE||'-M',SALAS_ID_SEQ.CURRVAL,'09:00:00','12:00:00',TO_DATE(TO_CHAR(SYSDATE,'yyyy-mm-dd hh24:mi:ss'),'yyyy-mm-dd hh24:mi:ss'));
                INSERT INTO SESIONS (ID,NOMBRE,SALA_ID,HORA_INICIO,HORA_FIN,CREATED_AT) VALUES (SESIONS_ID_SEQ.NEXTVAL,NOMBRE||'-V',SALAS_ID_SEQ.CURRVAL,'13:00:00','16:00:00',TO_DATE(TO_CHAR(SYSDATE,'yyyy-mm-dd hh24:mi:ss'),'yyyy-mm-dd hh24:mi:ss'));
                END IF;
                 END INSERTSALA;    
        
        PROCEDURE UPDATESALA(IDE NUMBER,ESTADOUP VARCHAR2, NOMBREUP VARCHAR2) IS
          BEGIN      
            UPDATE SALAS SA SET SA.NOMBRE = NOMBREUP,SA.ESTADO = ESTADOUP, SA.UPDATED_AT = TO_DATE(TO_CHAR(SYSDATE,'yyyy-mm-dd hh24:mi:ss'),'yyyy-mm-dd hh24:mi:ss') WHERE SA.ID = IDE;
        END UPDATESALA;
        
        PROCEDURE DELETESALA(IDD NUMBER) IS
          BEGIN 
            UPDATE SALAS SA SET SA.ESTADO = 'I' WHERE SA.ID = IDD;
            END DELETESALA;    
        
END PK_SALAS;
/
--FINAL SALAS

--EXPOSICION 
CREATE OR REPLACE PACKAGE PK_EXPOSICION AS
  PROCEDURE INSERTEXPOSICION(TITULO VARCHAR2,DURACION VARCHAR2);
  PROCEDURE DELETEEXPOSICION(IDE NUMBER);
END PK_EXPOSICION;
/
CREATE OR REPLACE PACKAGE BODY PK_EXPOSICION AS
 PROCEDURE INSERTEXPOSICION(TITULO VARCHAR2,DURACION VARCHAR2) IS
   BEGIN
     INSERT INTO EXPOSICIONS(ID,TITULO,ESTADO, DURACION,CREATED_AT)  VALUES(EXPOSICIONS_ID_SEQ.NEXTVAL,TITULO,'A',DURACION,TO_DATE(TO_CHAR(SYSDATE,'yyyy-mm-dd hh24:mi:ss'),'yyyy-mm-dd hh24:mi:ss'));
     END INSERTEXPOSICION;
     
     PROCEDURE DELETEEXPOSICION(IDE NUMBER) AS
       BEGIN 
         UPDATE EXPOSICIONS EXPO SET EXPO.ESTADO = 'I',EXPO.UPDATED_AT = TO_DATE(TO_CHAR(SYSDATE,'yyyy-mm-dd hh24:mi:ss'),'yyyy-mm-dd hh24:mi:ss') WHERE EXPO.ID = IDE; 
         END DELETEEXPOSICION;
   
END PK_EXPOSICION;
--FINAL DE EXPOSICION

--EXPOSITOR 
CREATE OR REPLACE PACKAGE PK_EXPOSITOR AS
END PK_EXPOSITOR;
CREATE OR REPLACE PACKAGE BODY PK_EXPOSITOR AS 
END PK_EXPOSITOR;

--FINAL DE EXPOSITOR



INSERT INTO ROLE_USER (ID,ROLE_ID,USER_ID,CREATED_AT) VALUES(ROLE_USER_ID_SEQ.NEXTVAL,1,24,TO_DATE(TO_CHAR(SYSDATE,'yyyy-mm-dd hh24:mi:ss'),'yyyy-mm-dd hh24:mi:ss'));
commit;







































------UTILIDADES------


CREATE OR REPLACE PACKAGE PK_EVENTOS AS 
       PROCEDURE INSERTEVENTO(NOMBRE VARCHAR2, FECHA_INICIO TIMESTAMP, FECHA_FIN TIMESTAMP);
       --PROCEDURE UPDATEEVENTO(IDE NUMBER,ESTADOUP VARCHAR2, NOMBREUP VARCHAR2,CODE_ERRUP OUT NUMBER);
       --PROCEDURE DELETEEVENTO(IDD NUMBER);
       LV_SESION VARCHAR2(30);
END PK_EVENTOS;

CREATE OR REPLACE PACKAGE BODY PK_EVENTOS AS

        FUNCTION VALIDARFECHA(FECHA_INI TIMESTAMP, FECHA_FI TIMESTAMP) RETURN NUMBER IS 
          LN_ADD NUMBER;
          BEGIN
              IF FECHA_FI > FECHA_INI OR FECHA_FI = FECHA_INI  THEN 
                LN_ADD:= LN_ADD + 1;
                ELSE 
                  LN_ADD:= 0;
                 RETURN LN_ADD;
                END IF;
          
              IF (TO_DATE(TO_CHAR(FECHA_INI,'hh24:mi:ss'),'hh24:mi:ss') BETWEEN TO_DATE('00:00:00','hh24:mi:ss') AND TO_DATE('12:00:00','hh24:mi:ss')) AND
            (TO_DATE(TO_CHAR(FECHA_FI,'hh24:mi:ss'),'hh24:mi:ss') BETWEEN TO_DATE('00:00:00','hh24:mi:ss') AND TO_DATE('12:00:00','hh24:mi:ss')) THEN 
             DBMS_OUTPUT.put_line('MATUTINA');
             LV_SESION:= 'MATUTINA';
             LN_ADD:= 2;
              RETURN LN_ADD;
             ELSE 
               IF (TO_DATE(TO_CHAR(FECHA_INI,'hh24:mi:ss'),'hh24:mi:ss') BETWEEN TO_DATE('12:00:00','hh24:mi:ss') AND TO_DATE('23:59:00','hh24:mi:ss'))
               AND (TO_DATE(TO_CHAR(FECHA_FI,'hh24:mi:ss'),'hh24:mi:ss') BETWEEN TO_DATE('12:00:00','hh24:mi:ss') AND TO_DATE('23:59:00','hh24:mi:ss')) THEN
                   LV_SESION:= 'VESPERTINA';
                   LN_ADD:= 2;
                   DBMS_OUTPUT.put_line(LN_ADD);
                    RETURN LN_ADD;
               END IF;
             END IF;
          END VALIDARFECHA; 
       
        PROCEDURE INSERTEVENTO(NOMBRE VARCHAR2, FECHA_INICIO TIMESTAMP, FECHA_FIN TIMESTAMP) IS 
          LN_CONT NUMBER;
        BEGIN 
          LN_CONT:= VALIDARFECHA(FECHA_INICIO,FECHA_FIN);
          IF  LN_CONT = 2 THEN
             INSERT INTO EVENTOS (ID,NOMBRE,ESTADO, SESION, FECHA_INICIO,FECHA_FIN,CREATED_AT) VALUES(EVENTOS_ID_SEQ.NEXTVAL,NOMBRE,'A',LV_SESION,FECHA_INICIO,FECHA_FIN,TO_DATE(TO_CHAR(SYSDATE,'yyyy-mm-dd hh24:mi:ss'),'yyyy-mm-dd hh24:mi:ss')); 
          ELSE 
            DBMS_OUTPUT.put_line('NO INSERTADO');
          END IF;
        END INSERTEVENTO;    
        
       /* PROCEDURE UPDATEEVENTO(IDE NUMBER,ESTADOUP VARCHAR2, NOMBREUP VARCHAR2,CODE_ERRUP OUT NUMBER) IS
          BEGIN         
            UPDATE SALAS SA SET SA.NOMBRE = NOMBREUP,SA.ESTADO = ESTADOUP, SA.UPDATED_AT = TO_DATE(TO_CHAR(SYSDATE,'yyyy-mm-dd hh24:mi:ss'),'yyyy-mm-dd hh24:mi:ss') WHERE SA.ID = IDE;
             CODE_ERRUP:= 200;
          EXCEPTION
            WHEN OTHERS THEN
              CODE_ERRUP:=4343;
        END UPDATEEVENTO;
        
        PROCEDURE DELETEEVENTO(IDD NUMBER) IS
          BEGIN 
            UPDATE SALAS SA SET SA.ESTADO = 'I' WHERE SA.ID = IDD;
            END DELETEEVENTO;   */ 
        
END PK_EVENTOS;



