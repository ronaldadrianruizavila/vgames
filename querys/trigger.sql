CREATE OR REPLACE TRIGGER "EXPOSICIONS_ID_TRG" 
            before insert on EXPOSICIONS
            for each row
                begin
            if :new.ID is null then
                select exposicions_id_seq.nextval into :new.ID from dual;
            end if;
            end;
/
ALTER TRIGGER "EXPOSICIONS_ID_TRG" ENABLE;

CREATE OR REPLACE TRIGGER "RA2"."EXPOSITORS_ID_TRG" 
            before insert on EXPOSITORS
            for each row
                begin
            if :new.ID is null then
                select expositors_id_seq.nextval into :new.ID from dual;
            end if;
            end;
/
ALTER TRIGGER "EXPOSITORS_ID_TRG" ENABLE;

CREATE OR REPLACE TRIGGER "RA2"."PERMISSION_ROLE_ID_TRG" 
            before insert on PERMISSION_ROLE
            for each row
                begin
            if :new.ID is null then
                select permission_role_id_seq.nextval into :new.ID from dual;
            end if;
            end;
/
ALTER TRIGGER "PERMISSION_ROLE_ID_TRG" ENABLE;


CREATE OR REPLACE TRIGGER "PERMISSIONS_ID_TRG" 
            before insert on PERMISSIONS
            for each row
                begin
            if :new.ID is null then
                select permissions_id_seq.nextval into :new.ID from dual;
            end if;
            end;
/
ALTER TRIGGER "PERMISSIONS_ID_TRG" ENABLE;



CREATE OR REPLACE TRIGGER "PERMISSION_USER_ID_TRG" 
            before insert on PERMISSION_USER
            for each row
                begin
            if :new.ID is null then
                select permission_user_id_seq.nextval into :new.ID from dual;
            end if;
            end;
/
ALTER TRIGGER "PERMISSION_USER_ID_TRG" ENABLE;


CREATE OR REPLACE TRIGGER "PERSONAS_ID_TRG" 
            before insert on PERSONAS
            for each row
                begin
            if :new.ID is null then
                select personas_id_seq.nextval into :new.ID from dual;
            end if;
            end;
/
ALTER TRIGGER "PERSONAS_ID_TRG" ENABLE;


CREATE OR REPLACE TRIGGER "ROLES_ID_TRG" 
            before insert on ROLES
            for each row
                begin
            if :new.ID is null then
                select roles_id_seq.nextval into :new.ID from dual;
            end if;
            end;
/
ALTER TRIGGER "ROLES_ID_TRG" ENABLE;

CREATE OR REPLACE TRIGGER "ROLE_USER_ID_TRG" 
            before insert on ROLE_USER
            for each row
                begin
            if :new.ID is null then
                select role_user_id_seq.nextval into :new.ID from dual;
            end if;
            end;
/
ALTER TRIGGER "ROLE_USER_ID_TRG" ENABLE;

CREATE OR REPLACE TRIGGER "SALAS_ID_TRG" 
            before insert on SALAS
            for each row
                begin
            if :new.ID is null then
                select salas_id_seq.nextval into :new.ID from dual;
            end if;
            end;
/
ALTER TRIGGER "SALAS_ID_TRG" ENABLE;


CREATE OR REPLACE TRIGGER "SESIONS_ID_TRG" 
            before insert on SESIONS
            for each row
                begin
            if :new.ID is null then
                select sesions_id_seq.nextval into :new.ID from dual;
            end if;
            end;
/
ALTER TRIGGER "SESIONS_ID_TRG" ENABLE;


CREATE OR REPLACE TRIGGER "USERS_ID_TRG" 
            before insert on USERS
            for each row
                begin
            if :new.ID is null then
                select users_id_seq.nextval into :new.ID from dual;
            end if;
            end;
/
ALTER TRIGGER "USERS_ID_TRG" ENABLE;
