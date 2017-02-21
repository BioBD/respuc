--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.24
-- Dumped by pg_dump version 9.5.5

-- Started on 2017-02-20 15:00:44

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 11645)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 1866 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 163 (class 1259 OID 16390)
-- Name: person; Type: TABLE; Schema: public; Owner: app
--

CREATE TABLE person (
    person_id integer NOT NULL,
    fullname character varying(50) NOT NULL
);


ALTER TABLE person OWNER TO app;

--
-- TOC entry 162 (class 1259 OID 16388)
-- Name: person_person_id_seq; Type: SEQUENCE; Schema: public; Owner: app
--

CREATE SEQUENCE person_person_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE person_person_id_seq OWNER TO app;

--
-- TOC entry 1867 (class 0 OID 0)
-- Dependencies: 162
-- Name: person_person_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: app
--

ALTER SEQUENCE person_person_id_seq OWNED BY person.person_id;


--
-- TOC entry 1751 (class 2604 OID 16393)
-- Name: person_id; Type: DEFAULT; Schema: public; Owner: app
--

ALTER TABLE ONLY person ALTER COLUMN person_id SET DEFAULT nextval('person_person_id_seq'::regclass);


--
-- TOC entry 1858 (class 0 OID 16390)
-- Dependencies: 163
-- Data for Name: person; Type: TABLE DATA; Schema: public; Owner: app
--

COPY person (person_id, fullname) FROM stdin;
2	Teste
3	Teste2
4	Teste3
\.


--
-- TOC entry 1868 (class 0 OID 0)
-- Dependencies: 162
-- Name: person_person_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('person_person_id_seq', 4, true);


--
-- TOC entry 1753 (class 2606 OID 16397)
-- Name: person_fullname_key; Type: CONSTRAINT; Schema: public; Owner: app
--

ALTER TABLE ONLY person
    ADD CONSTRAINT person_fullname_key UNIQUE (fullname);


--
-- TOC entry 1755 (class 2606 OID 16395)
-- Name: person_pkey; Type: CONSTRAINT; Schema: public; Owner: app
--

ALTER TABLE ONLY person
    ADD CONSTRAINT person_pkey PRIMARY KEY (person_id);


--
-- TOC entry 1865 (class 0 OID 0)
-- Dependencies: 7
-- Name: public; Type: ACL; Schema: -; Owner: app
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM app;
GRANT ALL ON SCHEMA public TO app;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2017-02-20 15:00:44

--
-- PostgreSQL database dump complete
--

