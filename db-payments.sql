--
-- PostgreSQL database dump
--

-- Dumped from database version 14.5 (Debian 14.5-1.pgdg110+1)
-- Dumped by pg_dump version 15.1

-- Started on 2023-07-28 14:33:53 WIB

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 4 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

-- *not* creating schema, since initdb creates it


ALTER SCHEMA public OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 209 (class 1259 OID 17133)
-- Name: transactions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.transactions (
    invoice_id uuid NOT NULL,
    merchant_id character varying(64) NOT NULL,
    references_id uuid NOT NULL,
    item_name character varying(80) NOT NULL,
    amount numeric(10,0) NOT NULL,
    payment_type character varying(45) NOT NULL,
    customer_name character varying(80) NOT NULL,
    number_va character varying(45) NOT NULL,
    status character varying(45) NOT NULL,
    signature character varying(500),
    created bigint,
    expired bigint
);


ALTER TABLE public.transactions OWNER TO postgres;

--
-- TOC entry 3307 (class 0 OID 17133)
-- Dependencies: 209
-- Data for Name: transactions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.transactions (invoice_id, merchant_id, references_id, item_name, amount, payment_type, customer_name, number_va, status, signature, created, expired) FROM stdin;
\.


--
-- TOC entry 3167 (class 2606 OID 17138)
-- Name: transactions transactions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transactions
    ADD CONSTRAINT transactions_pkey PRIMARY KEY (invoice_id);


--
-- TOC entry 3313 (class 0 OID 0)
-- Dependencies: 4
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2023-07-28 14:33:53 WIB

--
-- PostgreSQL database dump complete
--

