--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.25
-- Dumped by pg_dump version 9.3.25
-- Started on 2021-08-10 21:30:27

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 1 (class 3079 OID 11750)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2151 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 171 (class 1259 OID 16456)
-- Name: c_menu; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.c_menu (
    id_menu integer NOT NULL,
    tgl_ins timestamp without time zone DEFAULT (to_char(now(), 'yyyy-mm-dd hh24:mi:ss'::text))::timestamp without time zone,
    nama_menu character varying,
    link_menu character varying,
    parent_menu integer,
    class_icon character varying,
    urut integer
);


ALTER TABLE public.c_menu OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 16463)
-- Name: c_menu_id_menu_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.c_menu_id_menu_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.c_menu_id_menu_seq OWNER TO postgres;

--
-- TOC entry 2152 (class 0 OID 0)
-- Dependencies: 172
-- Name: c_menu_id_menu_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.c_menu_id_menu_seq OWNED BY public.c_menu.id_menu;


--
-- TOC entry 173 (class 1259 OID 16465)
-- Name: m_agama; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.m_agama (
    id_agama integer NOT NULL,
    tgl_ins timestamp without time zone DEFAULT (to_char(now(), 'yyyy-mm-dd hh24:mi:ss'::text))::timestamp without time zone,
    nama_agama character varying
);


ALTER TABLE public.m_agama OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 16472)
-- Name: m_agama_id_agama_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.m_agama_id_agama_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.m_agama_id_agama_seq OWNER TO postgres;

--
-- TOC entry 2153 (class 0 OID 0)
-- Dependencies: 174
-- Name: m_agama_id_agama_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.m_agama_id_agama_seq OWNED BY public.m_agama.id_agama;


--
-- TOC entry 175 (class 1259 OID 16474)
-- Name: m_desa; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.m_desa (
    id_desa integer NOT NULL,
    tgl_ins timestamp without time zone DEFAULT (to_char(now(), 'yyyy-mm-dd hh24:mi:ss'::text))::timestamp without time zone,
    nama_desa character varying,
    id_kecamatan integer,
    id_kota integer,
    id_provinsi integer
);


ALTER TABLE public.m_desa OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 16481)
-- Name: m_desa_id_desa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.m_desa_id_desa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.m_desa_id_desa_seq OWNER TO postgres;

--
-- TOC entry 2154 (class 0 OID 0)
-- Dependencies: 176
-- Name: m_desa_id_desa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.m_desa_id_desa_seq OWNED BY public.m_desa.id_desa;


--
-- TOC entry 177 (class 1259 OID 16483)
-- Name: m_jabatan; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.m_jabatan (
    id_jabatan integer NOT NULL,
    tgl_ins timestamp without time zone DEFAULT (to_char(now(), 'yyyy-mm-dd hh24:mi:ss'::text))::timestamp without time zone,
    nama_jabatan character varying
);


ALTER TABLE public.m_jabatan OWNER TO postgres;

--
-- TOC entry 178 (class 1259 OID 16490)
-- Name: m_jabatan_id_jabatan_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.m_jabatan_id_jabatan_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.m_jabatan_id_jabatan_seq OWNER TO postgres;

--
-- TOC entry 2155 (class 0 OID 0)
-- Dependencies: 178
-- Name: m_jabatan_id_jabatan_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.m_jabatan_id_jabatan_seq OWNED BY public.m_jabatan.id_jabatan;


--
-- TOC entry 179 (class 1259 OID 16492)
-- Name: m_jenis_keluarga; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.m_jenis_keluarga (
    id_jenis_keluarga integer NOT NULL,
    tgl_ins timestamp without time zone DEFAULT (to_char(now(), 'yyyy-mm-dd hh24:mi:ss'::text))::timestamp without time zone,
    nama_jenis_keluarga character varying
);


ALTER TABLE public.m_jenis_keluarga OWNER TO postgres;

--
-- TOC entry 180 (class 1259 OID 16499)
-- Name: m_jenis_keluarga_id_jenis_keluarga_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.m_jenis_keluarga_id_jenis_keluarga_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.m_jenis_keluarga_id_jenis_keluarga_seq OWNER TO postgres;

--
-- TOC entry 2156 (class 0 OID 0)
-- Dependencies: 180
-- Name: m_jenis_keluarga_id_jenis_keluarga_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.m_jenis_keluarga_id_jenis_keluarga_seq OWNED BY public.m_jenis_keluarga.id_jenis_keluarga;


--
-- TOC entry 181 (class 1259 OID 16501)
-- Name: m_jeniskelamin; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.m_jeniskelamin (
    id_jk integer NOT NULL,
    tgl_ins timestamp without time zone DEFAULT (to_char(now(), 'yyyy-mm-dd hh24:mi:ss'::text))::timestamp without time zone,
    nama_jk character varying
);


ALTER TABLE public.m_jeniskelamin OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 16508)
-- Name: m_jk_id_jk_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.m_jk_id_jk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.m_jk_id_jk_seq OWNER TO postgres;

--
-- TOC entry 2157 (class 0 OID 0)
-- Dependencies: 182
-- Name: m_jk_id_jk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.m_jk_id_jk_seq OWNED BY public.m_jeniskelamin.id_jk;


--
-- TOC entry 183 (class 1259 OID 16510)
-- Name: m_kecamatan; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.m_kecamatan (
    id_kecamatan integer NOT NULL,
    tgl_ins timestamp without time zone DEFAULT (to_char(now(), 'yyyy-mm-dd hh24:mi:ss'::text))::timestamp without time zone,
    nama_kecamatan character varying,
    id_kota integer,
    id_provinsi integer
);


ALTER TABLE public.m_kecamatan OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 16517)
-- Name: m_kecamatan_id_kecamatan_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.m_kecamatan_id_kecamatan_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.m_kecamatan_id_kecamatan_seq OWNER TO postgres;

--
-- TOC entry 2158 (class 0 OID 0)
-- Dependencies: 184
-- Name: m_kecamatan_id_kecamatan_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.m_kecamatan_id_kecamatan_seq OWNED BY public.m_kecamatan.id_kecamatan;


--
-- TOC entry 185 (class 1259 OID 16519)
-- Name: m_kota; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.m_kota (
    id_kota integer NOT NULL,
    tgl_ins timestamp without time zone DEFAULT (to_char(now(), 'yyyy-mm-dd hh24:mi:ss'::text))::timestamp without time zone,
    nama_kota character varying,
    id_provinsi integer
);


ALTER TABLE public.m_kota OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 16526)
-- Name: m_kota_id_kota_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.m_kota_id_kota_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.m_kota_id_kota_seq OWNER TO postgres;

--
-- TOC entry 2159 (class 0 OID 0)
-- Dependencies: 186
-- Name: m_kota_id_kota_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.m_kota_id_kota_seq OWNED BY public.m_kota.id_kota;


--
-- TOC entry 187 (class 1259 OID 16528)
-- Name: m_pekerjaan; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.m_pekerjaan (
    id_pekerjaan integer NOT NULL,
    tgl_ins timestamp without time zone DEFAULT (to_char(now(), 'yyyy-mm-dd hh24:mi:ss'::text))::timestamp without time zone,
    nama_pekerjaan character varying
);


ALTER TABLE public.m_pekerjaan OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 16535)
-- Name: m_pekerjaan_id_pekerjaan_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.m_pekerjaan_id_pekerjaan_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.m_pekerjaan_id_pekerjaan_seq OWNER TO postgres;

--
-- TOC entry 2160 (class 0 OID 0)
-- Dependencies: 188
-- Name: m_pekerjaan_id_pekerjaan_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.m_pekerjaan_id_pekerjaan_seq OWNED BY public.m_pekerjaan.id_pekerjaan;


--
-- TOC entry 189 (class 1259 OID 16537)
-- Name: m_pendidikan; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.m_pendidikan (
    id_pendidikan integer NOT NULL,
    tgl_ins timestamp without time zone DEFAULT (to_char(now(), 'yyyy-mm-dd hh24:mi:ss'::text))::timestamp without time zone,
    nama_pendidikan character varying
);


ALTER TABLE public.m_pendidikan OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 16544)
-- Name: m_pendidikan_id_pendidikan_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.m_pendidikan_id_pendidikan_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.m_pendidikan_id_pendidikan_seq OWNER TO postgres;

--
-- TOC entry 2161 (class 0 OID 0)
-- Dependencies: 190
-- Name: m_pendidikan_id_pendidikan_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.m_pendidikan_id_pendidikan_seq OWNED BY public.m_pendidikan.id_pendidikan;


--
-- TOC entry 191 (class 1259 OID 16546)
-- Name: m_provinsi; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.m_provinsi (
    id_provinsi integer NOT NULL,
    tgl_ins timestamp without time zone DEFAULT (to_char(now(), 'yyyy-mm-dd hh24:mi:ss'::text))::timestamp without time zone,
    nama_provinsi character varying
);


ALTER TABLE public.m_provinsi OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 16553)
-- Name: m_provinsi_id_provinsi_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.m_provinsi_id_provinsi_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.m_provinsi_id_provinsi_seq OWNER TO postgres;

--
-- TOC entry 2162 (class 0 OID 0)
-- Dependencies: 192
-- Name: m_provinsi_id_provinsi_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.m_provinsi_id_provinsi_seq OWNED BY public.m_provinsi.id_provinsi;


--
-- TOC entry 193 (class 1259 OID 16555)
-- Name: m_siswa; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.m_siswa (
    id_siswa integer NOT NULL,
    tgl_ins timestamp without time zone DEFAULT (to_char(now(), 'yyyy-mm-dd hh24:mi:ss'::text))::timestamp without time zone,
    id_user integer,
    nik character varying,
    id_jk integer,
    tmp_lahir character varying,
    tgl_lahir date,
    id_agama integer,
    anak_ke integer,
    jml_sdra integer,
    id_jenis_keluarga integer,
    id_transportasi integer,
    alamat text,
    rt character varying,
    rw character varying,
    id_desa integer,
    id_kecamatan integer,
    id_kota integer,
    id_provinsi integer,
    kodepos character varying,
    nama_ibu character varying,
    id_pendidikan_ibu integer,
    id_pekerjaan_ibu integer,
    penghasilan_ibu character varying,
    nama_ayah character varying,
    id_pendidikan_ayah integer,
    id_pekerjaan_ayah integer,
    penghasilan_ayah character varying,
    nama_wali character varying,
    id_pendidikan_wali integer,
    id_pekerjaan_wali integer,
    penghasilan_wali character varying
);


ALTER TABLE public.m_siswa OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 16562)
-- Name: m_siswa_id_siswa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.m_siswa_id_siswa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.m_siswa_id_siswa_seq OWNER TO postgres;

--
-- TOC entry 2163 (class 0 OID 0)
-- Dependencies: 194
-- Name: m_siswa_id_siswa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.m_siswa_id_siswa_seq OWNED BY public.m_siswa.id_siswa;


--
-- TOC entry 195 (class 1259 OID 16564)
-- Name: m_transportasi; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.m_transportasi (
    id_transportasi integer NOT NULL,
    tgl_ins timestamp without time zone DEFAULT (to_char(now(), 'yyyy-mm-dd hh24:mi:ss'::text))::timestamp without time zone,
    nama_transportasi character varying
);


ALTER TABLE public.m_transportasi OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 16571)
-- Name: m_transportasi_id_transportasi_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.m_transportasi_id_transportasi_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.m_transportasi_id_transportasi_seq OWNER TO postgres;

--
-- TOC entry 2164 (class 0 OID 0)
-- Dependencies: 196
-- Name: m_transportasi_id_transportasi_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.m_transportasi_id_transportasi_seq OWNED BY public.m_transportasi.id_transportasi;


--
-- TOC entry 197 (class 1259 OID 16573)
-- Name: m_user; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.m_user (
    id_user integer NOT NULL,
    tgl_ins timestamp without time zone DEFAULT (to_char(now(), 'yyyy-mm-dd hh24:mi:ss'::text))::timestamp without time zone,
    username character varying,
    email character varying,
    passwd character varying,
    no_hp character varying,
    foto character varying,
    id_jabatan integer,
    nama_lengkap character varying,
    urut integer,
    status boolean DEFAULT true
);


ALTER TABLE public.m_user OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 16581)
-- Name: m_user_id_user_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.m_user_id_user_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.m_user_id_user_seq OWNER TO postgres;

--
-- TOC entry 2165 (class 0 OID 0)
-- Dependencies: 198
-- Name: m_user_id_user_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.m_user_id_user_seq OWNED BY public.m_user.id_user;


--
-- TOC entry 199 (class 1259 OID 16583)
-- Name: t_menu_user; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.t_menu_user (
    id_menu_user integer NOT NULL,
    tgl_ins timestamp without time zone DEFAULT (to_char(now(), 'yyyy-mm-dd hh24:mi:ss'::text))::timestamp without time zone,
    id_menu integer,
    id_jabatan integer
);


ALTER TABLE public.t_menu_user OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 16587)
-- Name: t_menu_user_id_menu_user_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_menu_user_id_menu_user_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_menu_user_id_menu_user_seq OWNER TO postgres;

--
-- TOC entry 2166 (class 0 OID 0)
-- Dependencies: 200
-- Name: t_menu_user_id_menu_user_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_menu_user_id_menu_user_seq OWNED BY public.t_menu_user.id_menu_user;


--
-- TOC entry 1922 (class 2604 OID 16589)
-- Name: id_menu; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.c_menu ALTER COLUMN id_menu SET DEFAULT nextval('public.c_menu_id_menu_seq'::regclass);


--
-- TOC entry 1924 (class 2604 OID 16590)
-- Name: id_agama; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_agama ALTER COLUMN id_agama SET DEFAULT nextval('public.m_agama_id_agama_seq'::regclass);


--
-- TOC entry 1926 (class 2604 OID 16591)
-- Name: id_desa; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_desa ALTER COLUMN id_desa SET DEFAULT nextval('public.m_desa_id_desa_seq'::regclass);


--
-- TOC entry 1928 (class 2604 OID 16592)
-- Name: id_jabatan; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_jabatan ALTER COLUMN id_jabatan SET DEFAULT nextval('public.m_jabatan_id_jabatan_seq'::regclass);


--
-- TOC entry 1930 (class 2604 OID 16593)
-- Name: id_jenis_keluarga; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_jenis_keluarga ALTER COLUMN id_jenis_keluarga SET DEFAULT nextval('public.m_jenis_keluarga_id_jenis_keluarga_seq'::regclass);


--
-- TOC entry 1932 (class 2604 OID 16594)
-- Name: id_jk; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_jeniskelamin ALTER COLUMN id_jk SET DEFAULT nextval('public.m_jk_id_jk_seq'::regclass);


--
-- TOC entry 1934 (class 2604 OID 16595)
-- Name: id_kecamatan; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_kecamatan ALTER COLUMN id_kecamatan SET DEFAULT nextval('public.m_kecamatan_id_kecamatan_seq'::regclass);


--
-- TOC entry 1936 (class 2604 OID 16596)
-- Name: id_kota; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_kota ALTER COLUMN id_kota SET DEFAULT nextval('public.m_kota_id_kota_seq'::regclass);


--
-- TOC entry 1938 (class 2604 OID 16597)
-- Name: id_pekerjaan; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_pekerjaan ALTER COLUMN id_pekerjaan SET DEFAULT nextval('public.m_pekerjaan_id_pekerjaan_seq'::regclass);


--
-- TOC entry 1940 (class 2604 OID 16598)
-- Name: id_pendidikan; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_pendidikan ALTER COLUMN id_pendidikan SET DEFAULT nextval('public.m_pendidikan_id_pendidikan_seq'::regclass);


--
-- TOC entry 1942 (class 2604 OID 16599)
-- Name: id_provinsi; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_provinsi ALTER COLUMN id_provinsi SET DEFAULT nextval('public.m_provinsi_id_provinsi_seq'::regclass);


--
-- TOC entry 1944 (class 2604 OID 16600)
-- Name: id_siswa; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_siswa ALTER COLUMN id_siswa SET DEFAULT nextval('public.m_siswa_id_siswa_seq'::regclass);


--
-- TOC entry 1946 (class 2604 OID 16601)
-- Name: id_transportasi; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_transportasi ALTER COLUMN id_transportasi SET DEFAULT nextval('public.m_transportasi_id_transportasi_seq'::regclass);


--
-- TOC entry 1949 (class 2604 OID 16602)
-- Name: id_user; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_user ALTER COLUMN id_user SET DEFAULT nextval('public.m_user_id_user_seq'::regclass);


--
-- TOC entry 1951 (class 2604 OID 16603)
-- Name: id_menu_user; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_menu_user ALTER COLUMN id_menu_user SET DEFAULT nextval('public.t_menu_user_id_menu_user_seq'::regclass);


--
-- TOC entry 2113 (class 0 OID 16456)
-- Dependencies: 171
-- Data for Name: c_menu; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.c_menu (id_menu, tgl_ins, nama_menu, link_menu, parent_menu, class_icon, urut) VALUES (1, '2021-07-10 23:35:10', 'Home', 'welcome', 0, 'fa fa-home', 10);
INSERT INTO public.c_menu (id_menu, tgl_ins, nama_menu, link_menu, parent_menu, class_icon, urut) VALUES (2, '2021-07-10 23:35:10', 'Master', '#', 0, 'fa fa-gears', 20);
INSERT INTO public.c_menu (id_menu, tgl_ins, nama_menu, link_menu, parent_menu, class_icon, urut) VALUES (3, '2021-07-10 23:35:10', 'Jabatan', 'master/jabatan', 2, 'fa fa-shield', 21);
INSERT INTO public.c_menu (id_menu, tgl_ins, nama_menu, link_menu, parent_menu, class_icon, urut) VALUES (4, '2021-07-10 23:35:10', 'Menu Akses', 'master/akses', 2, 'fa fa-list', 22);
INSERT INTO public.c_menu (id_menu, tgl_ins, nama_menu, link_menu, parent_menu, class_icon, urut) VALUES (5, '2021-07-10 23:35:10', 'User', 'master/user', 2, 'fa fa-users', 23);
INSERT INTO public.c_menu (id_menu, tgl_ins, nama_menu, link_menu, parent_menu, class_icon, urut) VALUES (6, '2021-07-11 07:10:04', 'Agama', 'master/agama', 2, 'fa fa-gg', 24);
INSERT INTO public.c_menu (id_menu, tgl_ins, nama_menu, link_menu, parent_menu, class_icon, urut) VALUES (12, '2021-07-31 20:31:09', 'Provinsi', 'master/provinsi', 2, 'fa fa-building', 291);
INSERT INTO public.c_menu (id_menu, tgl_ins, nama_menu, link_menu, parent_menu, class_icon, urut) VALUES (11, '2021-07-11 11:14:39', 'Jenis keluarga', 'master/jenis_keluarga', 2, 'fa fa-user', 29);
INSERT INTO public.c_menu (id_menu, tgl_ins, nama_menu, link_menu, parent_menu, class_icon, urut) VALUES (7, '2021-07-11 07:34:11', 'Pekerjaan', 'master/pekerjaan', 2, 'fa fa-adjust', 25);
INSERT INTO public.c_menu (id_menu, tgl_ins, nama_menu, link_menu, parent_menu, class_icon, urut) VALUES (8, '2021-07-11 10:26:18', 'Pendidikan', 'master/pendidikan', 2, 'fa fa-book', 26);
INSERT INTO public.c_menu (id_menu, tgl_ins, nama_menu, link_menu, parent_menu, class_icon, urut) VALUES (9, '2021-07-11 10:36:38', 'Transportasi', 'master/transportasi', 2, 'fa fa-car', 27);
INSERT INTO public.c_menu (id_menu, tgl_ins, nama_menu, link_menu, parent_menu, class_icon, urut) VALUES (10, '2021-07-11 10:42:35', 'Jenis kelamin', 'master/jeniskelamin', 2, 'fa fa-venus-mars', 28);


--
-- TOC entry 2167 (class 0 OID 0)
-- Dependencies: 172
-- Name: c_menu_id_menu_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.c_menu_id_menu_seq', 12, true);


--
-- TOC entry 2115 (class 0 OID 16465)
-- Dependencies: 173
-- Data for Name: m_agama; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.m_agama (id_agama, tgl_ins, nama_agama) VALUES (1, '2021-07-11 07:17:53', 'Islam');
INSERT INTO public.m_agama (id_agama, tgl_ins, nama_agama) VALUES (2, '2021-07-11 07:18:05', 'Kriten Katolik');
INSERT INTO public.m_agama (id_agama, tgl_ins, nama_agama) VALUES (3, '2021-07-11 07:18:16', 'Kristen Protestan');
INSERT INTO public.m_agama (id_agama, tgl_ins, nama_agama) VALUES (4, '2021-07-11 07:18:21', 'Hindu');
INSERT INTO public.m_agama (id_agama, tgl_ins, nama_agama) VALUES (5, '2021-07-11 07:18:27', 'Budha');
INSERT INTO public.m_agama (id_agama, tgl_ins, nama_agama) VALUES (6, '2021-07-11 07:18:35', 'Konghucu');


--
-- TOC entry 2168 (class 0 OID 0)
-- Dependencies: 174
-- Name: m_agama_id_agama_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.m_agama_id_agama_seq', 6, true);


--
-- TOC entry 2117 (class 0 OID 16474)
-- Dependencies: 175
-- Data for Name: m_desa; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2169 (class 0 OID 0)
-- Dependencies: 176
-- Name: m_desa_id_desa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.m_desa_id_desa_seq', 1, false);


--
-- TOC entry 2119 (class 0 OID 16483)
-- Dependencies: 177
-- Data for Name: m_jabatan; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.m_jabatan (id_jabatan, tgl_ins, nama_jabatan) VALUES (2, '2021-07-10 23:31:11', 'Admin');
INSERT INTO public.m_jabatan (id_jabatan, tgl_ins, nama_jabatan) VALUES (3, '2021-07-10 23:31:15', 'Siswa');
INSERT INTO public.m_jabatan (id_jabatan, tgl_ins, nama_jabatan) VALUES (4, '2021-07-10 23:31:21', 'Keuangan');
INSERT INTO public.m_jabatan (id_jabatan, tgl_ins, nama_jabatan) VALUES (1, '2021-07-10 23:30:31', 'Super Admin');


--
-- TOC entry 2170 (class 0 OID 0)
-- Dependencies: 178
-- Name: m_jabatan_id_jabatan_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.m_jabatan_id_jabatan_seq', 4, true);


--
-- TOC entry 2121 (class 0 OID 16492)
-- Dependencies: 179
-- Data for Name: m_jenis_keluarga; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.m_jenis_keluarga (id_jenis_keluarga, tgl_ins, nama_jenis_keluarga) VALUES (5, '2021-07-31 20:01:37', 'Tiri');
INSERT INTO public.m_jenis_keluarga (id_jenis_keluarga, tgl_ins, nama_jenis_keluarga) VALUES (3, '2021-07-31 19:59:49', 'Angkat');
INSERT INTO public.m_jenis_keluarga (id_jenis_keluarga, tgl_ins, nama_jenis_keluarga) VALUES (4, '2021-07-31 19:59:56', 'Titipan');
INSERT INTO public.m_jenis_keluarga (id_jenis_keluarga, tgl_ins, nama_jenis_keluarga) VALUES (6, '2021-07-31 20:02:16', 'Kandung');


--
-- TOC entry 2171 (class 0 OID 0)
-- Dependencies: 180
-- Name: m_jenis_keluarga_id_jenis_keluarga_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.m_jenis_keluarga_id_jenis_keluarga_seq', 6, true);


--
-- TOC entry 2123 (class 0 OID 16501)
-- Dependencies: 181
-- Data for Name: m_jeniskelamin; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2172 (class 0 OID 0)
-- Dependencies: 182
-- Name: m_jk_id_jk_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.m_jk_id_jk_seq', 1, false);


--
-- TOC entry 2125 (class 0 OID 16510)
-- Dependencies: 183
-- Data for Name: m_kecamatan; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2173 (class 0 OID 0)
-- Dependencies: 184
-- Name: m_kecamatan_id_kecamatan_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.m_kecamatan_id_kecamatan_seq', 1, false);


--
-- TOC entry 2127 (class 0 OID 16519)
-- Dependencies: 185
-- Data for Name: m_kota; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2174 (class 0 OID 0)
-- Dependencies: 186
-- Name: m_kota_id_kota_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.m_kota_id_kota_seq', 1, false);


--
-- TOC entry 2129 (class 0 OID 16528)
-- Dependencies: 187
-- Data for Name: m_pekerjaan; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (1, '2021-07-11 11:24:04', 'AKUNTAN');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (2, '2021-07-11 11:24:18', 'ANGGOTA BPK');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (3, '2021-07-11 11:25:53', 'ANGGOTA DPR KABUPATEN / KOTA');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (4, '2021-07-11 11:27:02', 'ANGGOTA DPR PROPINSI');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (5, '2021-07-11 11:27:09', 'ANGGOTA DPR RI');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (6, '2021-07-11 11:27:31', 'ANGGOTA KABINET KEMENTRIAN');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (7, '2021-07-11 11:27:51', 'ANGGOTA MAHKAMAH KONSTITUSI');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (8, '2021-07-11 11:27:56', 'ANGGOTA DPD');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (9, '2021-07-11 11:28:08', 'APOTEKER');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (10, '2021-07-11 11:28:12', 'ARSITEK');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (11, '2021-07-11 11:28:28', 'BELUM/TIDAK BEKERJA');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (12, '2021-07-11 11:28:38', 'BIARAWATI');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (13, '2021-07-11 11:28:43', 'BIDAN');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (14, '2021-07-11 11:28:56', 'BUPATI');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (15, '2021-07-11 11:29:03', 'BURUH HARIAN LEPAS');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (16, '2021-07-11 11:29:19', 'BURUH PERTERNAKAN');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (17, '2021-07-11 11:29:31', 'BURUH TANI/PERKEBUNAN');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (18, '2021-07-11 11:29:40', 'DOKTER');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (19, '2021-07-11 11:29:44', 'DOSEN');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (20, '2021-07-11 11:29:51', 'DUTA BESAR');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (21, '2021-07-11 11:30:01', 'GUBERNUR');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (22, '2021-07-11 11:30:05', 'GURU');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (23, '2021-07-11 11:30:14', 'IMAM MASJID');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (24, '2021-07-11 11:30:25', 'INDUSTRI');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (25, '2021-07-11 11:30:31', 'JURU MASAK');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (26, '2021-07-11 11:30:53', 'KARYAWAN BUMD');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (27, '2021-07-11 11:31:01', 'KARYAWAN BUMN');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (28, '2021-07-11 11:31:27', 'KARYAWAN HONORER');
INSERT INTO public.m_pekerjaan (id_pekerjaan, tgl_ins, nama_pekerjaan) VALUES (29, '2021-07-11 11:31:48', 'KARYAWAN SWASTA');


--
-- TOC entry 2175 (class 0 OID 0)
-- Dependencies: 188
-- Name: m_pekerjaan_id_pekerjaan_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.m_pekerjaan_id_pekerjaan_seq', 29, true);


--
-- TOC entry 2131 (class 0 OID 16537)
-- Dependencies: 189
-- Data for Name: m_pendidikan; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.m_pendidikan (id_pendidikan, tgl_ins, nama_pendidikan) VALUES (1, '2021-07-11 11:18:22', 'SD /SEDERAJAT');
INSERT INTO public.m_pendidikan (id_pendidikan, tgl_ins, nama_pendidikan) VALUES (2, '2021-07-11 11:18:27', 'SMP / SEDERAJAT');
INSERT INTO public.m_pendidikan (id_pendidikan, tgl_ins, nama_pendidikan) VALUES (3, '2021-07-11 11:18:31', 'SMA/SMK / SEDERAJAT');
INSERT INTO public.m_pendidikan (id_pendidikan, tgl_ins, nama_pendidikan) VALUES (5, '2021-07-11 11:20:55', 'DIPLOMA II (D2)');
INSERT INTO public.m_pendidikan (id_pendidikan, tgl_ins, nama_pendidikan) VALUES (4, '2021-07-11 11:18:35', 'DIPLOMA I (D1)');
INSERT INTO public.m_pendidikan (id_pendidikan, tgl_ins, nama_pendidikan) VALUES (6, '2021-07-11 11:21:19', 'DIPLOMA III (D3)');
INSERT INTO public.m_pendidikan (id_pendidikan, tgl_ins, nama_pendidikan) VALUES (7, '2021-07-11 11:21:56', 'DIPLOMA IV (D4)/STRATA I (S1)');
INSERT INTO public.m_pendidikan (id_pendidikan, tgl_ins, nama_pendidikan) VALUES (8, '2021-07-11 11:22:10', 'STRATA II (S2)');
INSERT INTO public.m_pendidikan (id_pendidikan, tgl_ins, nama_pendidikan) VALUES (9, '2021-07-11 11:22:32', 'STRATA III (S3)');


--
-- TOC entry 2176 (class 0 OID 0)
-- Dependencies: 190
-- Name: m_pendidikan_id_pendidikan_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.m_pendidikan_id_pendidikan_seq', 9, true);


--
-- TOC entry 2133 (class 0 OID 16546)
-- Dependencies: 191
-- Data for Name: m_provinsi; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.m_provinsi (id_provinsi, tgl_ins, nama_provinsi) VALUES (1, '2021-07-31 21:22:08', 'Jawa Timur');
INSERT INTO public.m_provinsi (id_provinsi, tgl_ins, nama_provinsi) VALUES (2, '2021-07-31 21:22:15', 'Jawa Tengah');
INSERT INTO public.m_provinsi (id_provinsi, tgl_ins, nama_provinsi) VALUES (3, '2021-07-31 21:22:23', 'Jawa Barat');
INSERT INTO public.m_provinsi (id_provinsi, tgl_ins, nama_provinsi) VALUES (4, '2021-07-31 21:24:34', 'Banten');
INSERT INTO public.m_provinsi (id_provinsi, tgl_ins, nama_provinsi) VALUES (5, '2021-07-31 21:24:45', 'Yogyakarta');
INSERT INTO public.m_provinsi (id_provinsi, tgl_ins, nama_provinsi) VALUES (6, '2021-07-31 21:24:57', 'Jakarta');


--
-- TOC entry 2177 (class 0 OID 0)
-- Dependencies: 192
-- Name: m_provinsi_id_provinsi_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.m_provinsi_id_provinsi_seq', 6, true);


--
-- TOC entry 2135 (class 0 OID 16555)
-- Dependencies: 193
-- Data for Name: m_siswa; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2178 (class 0 OID 0)
-- Dependencies: 194
-- Name: m_siswa_id_siswa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.m_siswa_id_siswa_seq', 1, false);


--
-- TOC entry 2137 (class 0 OID 16564)
-- Dependencies: 195
-- Data for Name: m_transportasi; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.m_transportasi (id_transportasi, tgl_ins, nama_transportasi) VALUES (1, '2021-07-11 11:17:53', 'Mobil');
INSERT INTO public.m_transportasi (id_transportasi, tgl_ins, nama_transportasi) VALUES (2, '2021-07-11 11:18:02', 'Sepeda Motor');
INSERT INTO public.m_transportasi (id_transportasi, tgl_ins, nama_transportasi) VALUES (3, '2021-07-11 11:18:15', 'Antar Jemput');
INSERT INTO public.m_transportasi (id_transportasi, tgl_ins, nama_transportasi) VALUES (4, '2021-07-28 19:38:57', 'sepeda ontel');


--
-- TOC entry 2179 (class 0 OID 0)
-- Dependencies: 196
-- Name: m_transportasi_id_transportasi_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.m_transportasi_id_transportasi_seq', 4, true);


--
-- TOC entry 2139 (class 0 OID 16573)
-- Dependencies: 197
-- Data for Name: m_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.m_user (id_user, tgl_ins, username, email, passwd, no_hp, foto, id_jabatan, nama_lengkap, urut, status) VALUES (1, '2021-07-11 00:16:10', '20210001', 'herbi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '081515469892', '20210001_Foto_.png', 1, 'Herbianto', 1, true);


--
-- TOC entry 2180 (class 0 OID 0)
-- Dependencies: 198
-- Name: m_user_id_user_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.m_user_id_user_seq', 1, true);


--
-- TOC entry 2141 (class 0 OID 16583)
-- Dependencies: 199
-- Data for Name: t_menu_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.t_menu_user (id_menu_user, tgl_ins, id_menu, id_jabatan) VALUES (1, '2021-07-10 23:40:15', 1, 1);
INSERT INTO public.t_menu_user (id_menu_user, tgl_ins, id_menu, id_jabatan) VALUES (2, '2021-07-10 23:40:15', 2, 1);
INSERT INTO public.t_menu_user (id_menu_user, tgl_ins, id_menu, id_jabatan) VALUES (3, '2021-07-10 23:40:15', 3, 1);
INSERT INTO public.t_menu_user (id_menu_user, tgl_ins, id_menu, id_jabatan) VALUES (4, '2021-07-10 23:40:15', 4, 1);
INSERT INTO public.t_menu_user (id_menu_user, tgl_ins, id_menu, id_jabatan) VALUES (5, '2021-07-10 23:40:15', 5, 1);
INSERT INTO public.t_menu_user (id_menu_user, tgl_ins, id_menu, id_jabatan) VALUES (6, '2021-07-11 07:10:19', 6, 1);
INSERT INTO public.t_menu_user (id_menu_user, tgl_ins, id_menu, id_jabatan) VALUES (9, '2021-07-11 09:29:20', 7, 1);
INSERT INTO public.t_menu_user (id_menu_user, tgl_ins, id_menu, id_jabatan) VALUES (10, '2021-07-11 10:26:30', 8, 1);
INSERT INTO public.t_menu_user (id_menu_user, tgl_ins, id_menu, id_jabatan) VALUES (11, '2021-07-11 10:36:50', 9, 1);
INSERT INTO public.t_menu_user (id_menu_user, tgl_ins, id_menu, id_jabatan) VALUES (12, '2021-07-11 10:42:44', 10, 1);
INSERT INTO public.t_menu_user (id_menu_user, tgl_ins, id_menu, id_jabatan) VALUES (13, '2021-07-11 11:15:42', 11, 1);
INSERT INTO public.t_menu_user (id_menu_user, tgl_ins, id_menu, id_jabatan) VALUES (16, '2021-08-10 20:33:21', 12, 1);


--
-- TOC entry 2181 (class 0 OID 0)
-- Dependencies: 200
-- Name: t_menu_user_id_menu_user_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_menu_user_id_menu_user_seq', 16, true);


--
-- TOC entry 1953 (class 2606 OID 16605)
-- Name: c_menu_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.c_menu
    ADD CONSTRAINT c_menu_pkey PRIMARY KEY (id_menu);


--
-- TOC entry 1955 (class 2606 OID 16607)
-- Name: m_agama_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.m_agama
    ADD CONSTRAINT m_agama_pkey PRIMARY KEY (id_agama);


--
-- TOC entry 1957 (class 2606 OID 16609)
-- Name: m_desa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.m_desa
    ADD CONSTRAINT m_desa_pkey PRIMARY KEY (id_desa);


--
-- TOC entry 1959 (class 2606 OID 16611)
-- Name: m_jabatan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.m_jabatan
    ADD CONSTRAINT m_jabatan_pkey PRIMARY KEY (id_jabatan);


--
-- TOC entry 1961 (class 2606 OID 16613)
-- Name: m_jenis_keluarga_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.m_jenis_keluarga
    ADD CONSTRAINT m_jenis_keluarga_pkey PRIMARY KEY (id_jenis_keluarga);


--
-- TOC entry 1963 (class 2606 OID 16615)
-- Name: m_jk_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.m_jeniskelamin
    ADD CONSTRAINT m_jk_pkey PRIMARY KEY (id_jk);


--
-- TOC entry 1965 (class 2606 OID 16617)
-- Name: m_kecamatan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.m_kecamatan
    ADD CONSTRAINT m_kecamatan_pkey PRIMARY KEY (id_kecamatan);


--
-- TOC entry 1967 (class 2606 OID 16619)
-- Name: m_kota_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.m_kota
    ADD CONSTRAINT m_kota_pkey PRIMARY KEY (id_kota);


--
-- TOC entry 1969 (class 2606 OID 16621)
-- Name: m_pekerjaan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.m_pekerjaan
    ADD CONSTRAINT m_pekerjaan_pkey PRIMARY KEY (id_pekerjaan);


--
-- TOC entry 1971 (class 2606 OID 16623)
-- Name: m_pendidikan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.m_pendidikan
    ADD CONSTRAINT m_pendidikan_pkey PRIMARY KEY (id_pendidikan);


--
-- TOC entry 1973 (class 2606 OID 16625)
-- Name: m_provinsi_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.m_provinsi
    ADD CONSTRAINT m_provinsi_pkey PRIMARY KEY (id_provinsi);


--
-- TOC entry 1975 (class 2606 OID 16627)
-- Name: m_siswa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.m_siswa
    ADD CONSTRAINT m_siswa_pkey PRIMARY KEY (id_siswa);


--
-- TOC entry 1977 (class 2606 OID 16629)
-- Name: m_transportasi_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.m_transportasi
    ADD CONSTRAINT m_transportasi_pkey PRIMARY KEY (id_transportasi);


--
-- TOC entry 1979 (class 2606 OID 16631)
-- Name: m_user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.m_user
    ADD CONSTRAINT m_user_pkey PRIMARY KEY (id_user);


--
-- TOC entry 1981 (class 2606 OID 16633)
-- Name: t_menu_user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.t_menu_user
    ADD CONSTRAINT t_menu_user_pkey PRIMARY KEY (id_menu_user);


--
-- TOC entry 1982 (class 2606 OID 16634)
-- Name: m_desa_id_kecamatan_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_desa
    ADD CONSTRAINT m_desa_id_kecamatan_fkey FOREIGN KEY (id_kecamatan) REFERENCES public.m_kecamatan(id_kecamatan);


--
-- TOC entry 1983 (class 2606 OID 16639)
-- Name: m_desa_id_kota_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_desa
    ADD CONSTRAINT m_desa_id_kota_fkey FOREIGN KEY (id_kota) REFERENCES public.m_kota(id_kota);


--
-- TOC entry 1984 (class 2606 OID 16644)
-- Name: m_desa_id_provinsi_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_desa
    ADD CONSTRAINT m_desa_id_provinsi_fkey FOREIGN KEY (id_provinsi) REFERENCES public.m_provinsi(id_provinsi);


--
-- TOC entry 1985 (class 2606 OID 16649)
-- Name: m_kecamatan_id_kota_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_kecamatan
    ADD CONSTRAINT m_kecamatan_id_kota_fkey FOREIGN KEY (id_kota) REFERENCES public.m_kota(id_kota);


--
-- TOC entry 1986 (class 2606 OID 16654)
-- Name: m_kecamatan_id_provinsi_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_kecamatan
    ADD CONSTRAINT m_kecamatan_id_provinsi_fkey FOREIGN KEY (id_provinsi) REFERENCES public.m_provinsi(id_provinsi);


--
-- TOC entry 1987 (class 2606 OID 16659)
-- Name: m_kota_id_provinsi_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_kota
    ADD CONSTRAINT m_kota_id_provinsi_fkey FOREIGN KEY (id_provinsi) REFERENCES public.m_provinsi(id_provinsi);


--
-- TOC entry 1988 (class 2606 OID 16664)
-- Name: m_siswa_id_agama_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_siswa
    ADD CONSTRAINT m_siswa_id_agama_fkey FOREIGN KEY (id_agama) REFERENCES public.m_agama(id_agama);


--
-- TOC entry 1989 (class 2606 OID 16669)
-- Name: m_siswa_id_desa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_siswa
    ADD CONSTRAINT m_siswa_id_desa_fkey FOREIGN KEY (id_desa) REFERENCES public.m_desa(id_desa);


--
-- TOC entry 1990 (class 2606 OID 16674)
-- Name: m_siswa_id_jenis_keluarga_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_siswa
    ADD CONSTRAINT m_siswa_id_jenis_keluarga_fkey FOREIGN KEY (id_jenis_keluarga) REFERENCES public.m_jenis_keluarga(id_jenis_keluarga);


--
-- TOC entry 1991 (class 2606 OID 16679)
-- Name: m_siswa_id_jk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_siswa
    ADD CONSTRAINT m_siswa_id_jk_fkey FOREIGN KEY (id_jk) REFERENCES public.m_jeniskelamin(id_jk);


--
-- TOC entry 1992 (class 2606 OID 16684)
-- Name: m_siswa_id_kecamatan_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_siswa
    ADD CONSTRAINT m_siswa_id_kecamatan_fkey FOREIGN KEY (id_kecamatan) REFERENCES public.m_kecamatan(id_kecamatan);


--
-- TOC entry 1993 (class 2606 OID 16689)
-- Name: m_siswa_id_kota_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_siswa
    ADD CONSTRAINT m_siswa_id_kota_fkey FOREIGN KEY (id_kota) REFERENCES public.m_kota(id_kota);


--
-- TOC entry 1994 (class 2606 OID 16694)
-- Name: m_siswa_id_pekerjaan_ayah_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_siswa
    ADD CONSTRAINT m_siswa_id_pekerjaan_ayah_fkey FOREIGN KEY (id_pekerjaan_ayah) REFERENCES public.m_pekerjaan(id_pekerjaan);


--
-- TOC entry 1995 (class 2606 OID 16699)
-- Name: m_siswa_id_pekerjaan_ibu_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_siswa
    ADD CONSTRAINT m_siswa_id_pekerjaan_ibu_fkey FOREIGN KEY (id_pekerjaan_ibu) REFERENCES public.m_pekerjaan(id_pekerjaan);


--
-- TOC entry 1996 (class 2606 OID 16704)
-- Name: m_siswa_id_pekerjaan_wali_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_siswa
    ADD CONSTRAINT m_siswa_id_pekerjaan_wali_fkey FOREIGN KEY (id_pekerjaan_wali) REFERENCES public.m_pekerjaan(id_pekerjaan);


--
-- TOC entry 1997 (class 2606 OID 16709)
-- Name: m_siswa_id_pendidikan_ayah_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_siswa
    ADD CONSTRAINT m_siswa_id_pendidikan_ayah_fkey FOREIGN KEY (id_pendidikan_ayah) REFERENCES public.m_pendidikan(id_pendidikan);


--
-- TOC entry 1998 (class 2606 OID 16714)
-- Name: m_siswa_id_pendidikan_ibu_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_siswa
    ADD CONSTRAINT m_siswa_id_pendidikan_ibu_fkey FOREIGN KEY (id_pendidikan_ibu) REFERENCES public.m_pendidikan(id_pendidikan);


--
-- TOC entry 1999 (class 2606 OID 16719)
-- Name: m_siswa_id_pendidikan_wali_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_siswa
    ADD CONSTRAINT m_siswa_id_pendidikan_wali_fkey FOREIGN KEY (id_pendidikan_wali) REFERENCES public.m_pendidikan(id_pendidikan);


--
-- TOC entry 2000 (class 2606 OID 16724)
-- Name: m_siswa_id_provinsi_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_siswa
    ADD CONSTRAINT m_siswa_id_provinsi_fkey FOREIGN KEY (id_provinsi) REFERENCES public.m_provinsi(id_provinsi);


--
-- TOC entry 2001 (class 2606 OID 16729)
-- Name: m_siswa_id_transportasi_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_siswa
    ADD CONSTRAINT m_siswa_id_transportasi_fkey FOREIGN KEY (id_transportasi) REFERENCES public.m_transportasi(id_transportasi);


--
-- TOC entry 2002 (class 2606 OID 16734)
-- Name: m_siswa_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_siswa
    ADD CONSTRAINT m_siswa_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.m_user(id_user);


--
-- TOC entry 2003 (class 2606 OID 16739)
-- Name: m_user_id_jabatan_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.m_user
    ADD CONSTRAINT m_user_id_jabatan_fkey FOREIGN KEY (id_jabatan) REFERENCES public.m_jabatan(id_jabatan);


--
-- TOC entry 2004 (class 2606 OID 16744)
-- Name: t_menu_user_id_jabatan_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_menu_user
    ADD CONSTRAINT t_menu_user_id_jabatan_fkey FOREIGN KEY (id_jabatan) REFERENCES public.m_jabatan(id_jabatan);


--
-- TOC entry 2005 (class 2606 OID 16749)
-- Name: t_menu_user_id_menu_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_menu_user
    ADD CONSTRAINT t_menu_user_id_menu_fkey FOREIGN KEY (id_menu) REFERENCES public.c_menu(id_menu);


--
-- TOC entry 2150 (class 0 OID 0)
-- Dependencies: 7
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2021-08-10 21:30:27

--
-- PostgreSQL database dump complete
--

