<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;
use Core\DateTimeUnit;

class Voucher
{
    /**
     * @var ReservaCarro
     */
    private $reserva;
    /**
     * @var AluguelCarrosFacade
     */
    private $aluguelcarros;

    public function __construct($facade = null, \Smarty $smarty)
    {
        if ($facade) {
            $this->aluguelcarros = $facade;
            $this->smarty = $smarty;
        }
    }

    function voucher_carro($reserva = NULL)
    {
        $voucher  = NULL;
        if ($reserva) {
            $show_banner = NULL;
            $this->reserva = $this->aluguelcarros->showReservaCarro($reserva);
            $condutor_gratis = $this->aluguelcarros->listCondutoresGratis(array('locadora' => $this->reserva->getLocadoraId(), 'ativo' => 1));
            if(is_object($condutor_gratis[0])) {
                $this->smarty->assign('show_condutor', $condutor_gratis[0]->getTextoVoucher());
            }
            $options_hora_cortesia = array(
                'data_retirada' => $this->reserva->getPeriodo()->getDataHoraInicial()->getDataHoraSql(),
                'data_devolucao' => $this->reserva->getPeriodo()->getDataHoraFinal()->getDataHoraSql(),
                'loja' => $this->reserva->getLojaRetirar()->getId()
            );
            if($this->reserva->getLocadora()->getHoraCortesiaLimit() && $this->reserva->getLocadora()->getHoraCortesia($options_hora_cortesia)) {
                $texto_diferencial_hora_cortesia = '<strong style="color: #FF0000;">Essa locadora oferece até '.$this->reserva->getLocadora()->getHoraCortesia($options_hora_cortesia).' horas de cortesia ao final da locação, não é desconto, mas é somado ao final do ciclo do vencimento da diária, que é de 24 horas.';
                $texto_diferencial_hora_cortesia .= ' Promoção válida para retiradas até '.$this->reserva->getLocadora()->getHoraCortesiaRetiDateFim()->getDataBr().' nesta loja.</strong>';
                $this->smarty->assign('show_hora_cortesia', $texto_diferencial_hora_cortesia);
            }
            $check_grupo = $this->reserva->getGrupo()->getId();
            $check_cidade = $this->reserva->getLojaRetirar()->getEndereco()->getCidade()->getId();
            $check_loja = $this->reserva->getLojaRetirar()->getId();
            $data_inicio_sol = new DateTimeUnit('2017-04-10T23:59:59');
            $cidade_banner_array = array(7994);
            if(in_array($check_cidade, $cidade_banner_array)){
                if (($check_grupo == 264) && $this->reserva->getPeriodo()->getDataHoraInicial()->getTimestamp() < $data_inicio_sol->getTimestamp()) {
                    $show_banner = '<strong style="color: #FF0000;">A reserva e o valor confirmados referem-se ao grupo C2 (b&aacute;sico com ar + dh), e no momento da retirada a pr&oacute;pria loja providenciar&aacute; upgrade para o grupo C3 (sedan 1.0 com ar e dh). Válido para reservas feitas e retiradas at&eacute; 10/04/2017</strong>';
                }
                if (($check_grupo == 266) && $this->reserva->getPeriodo()->getDataHoraInicial()->getTimestamp() < $data_inicio_sol->getTimestamp()) {
                    $show_banner = '<strong style="color: #FF0000;">A reserva e o valor confirmados referem-se ao grupo D1 (Compacto), e no momento da retirada a pr&oacute;pria loja providenciar&aacute; upgrade para o grupo F (sedan 1.6 com ar e dh). Válido para reservas feitas e retiradas at&eacute; 10/04/2017</strong>';
                }
            }
            $loja_bannerlocaliza_array = array(1667,1672,1674,1675,1678,1679,1680,1681,1683,1686,1687,1689,1691,1693,1694,1695,1696,1697,1700,1701,1703,1704,1707,1708,1709,1710,1711,1713,1714,1716,1717,1720,1722,1723,1727,1728,1729,1731,1733,1734,1735,1736,1737,1738,1739,1741,1742,1743,1744,1745,1746,1747,1748,1751,1752,1753,1754,1757,1759,1760,1761,1762,1767,1769,1770,1771,1772,1773,1774,1775,1776,1777,1779,1780,1781,1782,1783,1784,1785,1786,1787,1788,1790,1791,1793,1800,1801,1803,1806,1808,1809,1810,1811,1812,1813,1816,1817,1818,1819,1820,1821,1823,1824,1827,1828,1829,1831,1834,1835,1836,1837,1838,1839,1842,1843,1844,1846,1850,1851,1852,1854,1855,1858,1859,1862,1864,1866,1867,1868,1869,1870,1871,1872,1877,1878,1879,1880,1881,1882,1883,1884,1887,1891,1895,1896,1897,1901,1903,1904,1907,1909,1910,1912,1914,1916,1918,1919,1920,1922,1925,1928,1929,1931,1933,1934,1935,1936,1937,1938,1941,1942,1943,1944,1947,1948,1950,1951,1953,1954,1955,1956,1958,1959,1962,1965,1966,1967,1968,1970,1971,1972,1973,1974,1975,1976,1978,1981,1982,1983,1984,1985,1986,1987,1991,1993,1994,1995,1996,1998,2000,2004,2005,2007,2008,2009,2011,2013,2016,2017,2019,2021,2022,2023,2027,2028,2029,2030,2031,2032,2033,2034,2035,2038,2039,2040,2041,2045,2046,2048,2049,2050,2051,2052,2055,2062,2065,2068,2070,2072,2075,2076,2077,2078,2079,2080,2083,2084,2085,2086,2089,2090,2091,2092,2094,2097,2098,2101,2103,2104,2105,2107,2108,2109,2110,2111,2113,2114,2115,2117,2118,2119,2122,2126,2127,2128,2132,2137,2138,2140,2141,2142,2143,2148,2151,2152,2154,2155,2159,2160,2162,2163,2165,2167,2212,3154,3213,3214,3216,3217,3218,3219,3220,3221,3222,3229,3231,3237,3238,3241,3243,3311,3312,3313,3314,3315,3330,3331,3332,3334,3335,3336,3337,3338,3339,3340,3341,3342,3343,3345,3346,3347,3348,3349,3351,3354,3355,3356,3359,3360,3361,3363,3488);
            $data_fim_sol = new DateTimeUnit('2017-05-10T23:59:59');
            $data_fim_reti = new DateTimeUnit('2017-12-15T23:59:59');
            if(in_array($check_loja, $loja_bannerlocaliza_array)) {
                if (($check_grupo == 916) && $this->reserva->getDataCadastro()->getTimestamp() < $data_fim_sol->getTimestamp() && $this->reserva->getPeriodo()->getDataHoraInicial()->getTimestamp() < $data_fim_reti->getTimestamp()) {
                    $show_banner = '<strong style="color: #FF0000;">A reserva e o valor confirmados referem-se ao grupo A (b&aacute;sico sem ar), e no momento da retirada a pr&oacute;pria loja providenciar&aacute; upgrade para o grupo C (b&aacute;sico com ar e dh). Válido para reservas efetuadas at&eacute; 10/05/2017, com retiradas at&eacute; 15/12/2017</strong>';
                }
            }
            $loja_bannerlocaliza_array_f = array(1667,1709,1723,1729,1741,1747,1762,1767,1783);
            $data_fim_soli = new DateTimeUnit('2017-04-30T23:59:59');
            $data_fim_retir = new DateTimeUnit('2017-11-30T23:59:59');
            if(in_array($check_loja, $loja_bannerlocaliza_array_f)) {
                if (($check_grupo == 918) && $this->reserva->getDataCadastro()->getTimestamp() < $data_fim_soli->getTimestamp() && $this->reserva->getPeriodo()->getDataHoraInicial()->getTimestamp() < $data_fim_retir->getTimestamp()) {
                    $show_banner = '<strong style="color: #FF0000;">A reserva e o valor confirmados referem-se ao grupo F (sedan compacto), e no momento da retirada a pr&oacute;pria loja providenciar&aacute; upgrade para o grupo G (suv compacto). Válido para reservas efetuadas at&eacute; 30/04/2017, com retiradas at&eacute; 30/11/2017</strong>';
                }
            }
            $loja_bannerlocaliza_array = array(1667,1672,1674,1675,1678,1679,1680,1681,1683,1686,1687,1689,1691,1693,1694,1695,1696,1697,1700,1701,1703,1704,1707,1708,1709,1710,1711,1713,1714,1716,1717,1720,1722,1723,1727,1728,1729,1731,1733,1734,1735,1736,1737,1738,1739,1741,1742,1743,1744,1745,1746,1747,1748,1751,1752,1753,1754,1757,1759,1760,1761,1762,1767,1769,1770,1771,1772,1773,1774,1775,1776,1777,1779,1780,1781,1782,1783,1784,1785,1786,1787,1788,1790,1791,1793,1800,1801,1803,1806,1808,1809,1810,1811,1812,1813,1816,1817,1818,1819,1820,1821,1823,1824,1827,1828,1829,1831,1834,1835,1836,1837,1838,1839,1842,1843,1844,1846,1850,1851,1852,1854,1855,1858,1859,1862,1864,1866,1867,1868,1869,1870,1871,1872,1877,1878,1879,1880,1881,1882,1883,1884,1887,1891,1895,1896,1897,1901,1903,1904,1907,1909,1910,1912,1914,1916,1918,1919,1920,1922,1925,1928,1929,1931,1933,1934,1935,1936,1937,1938,1941,1942,1943,1944,1947,1948,1950,1951,1953,1954,1955,1956,1958,1959,1962,1965,1966,1967,1968,1970,1971,1972,1973,1974,1975,1976,1978,1981,1982,1983,1984,1985,1986,1987,1991,1993,1994,1995,1996,1998,2000,2004,2005,2007,2008,2009,2011,2013,2016,2017,2019,2021,2022,2023,2027,2028,2029,2030,2031,2032,2033,2034,2035,2038,2039,2040,2041,2045,2046,2048,2049,2050,2051,2052,2055,2062,2065,2068,2070,2072,2075,2076,2077,2078,2079,2080,2083,2084,2085,2086,2089,2090,2091,2092,2094,2097,2098,2101,2103,2104,2105,2107,2108,2109,2110,2111,2113,2114,2115,2117,2118,2119,2122,2126,2127,2128,2132,2137,2138,2140,2141,2142,2143,2148,2151,2152,2154,2155,2159,2160,2162,2163,2165,2167,2212,3154,3213,3214,3216,3217,3218,3219,3220,3221,3222,3229,3231,3237,3238,3241,3243,3311,3312,3313,3314,3315,3330,3331,3332,3334,3335,3336,3337,3338,3339,3340,3341,3342,3343,3345,3346,3347,3348,3349,3351,3354,3355,3356,3359,3360,3361,3363,3488);
            $data_fim_sol = new DateTimeUnit('2017-08-31T23:59:59');
            $data_fim_reti = new DateTimeUnit('2017-08-31T23:59:59');
            if(in_array($check_loja, $loja_bannerlocaliza_array)) {
                if (($check_grupo == 916) && $this->reserva->getDataCadastro()->getTimestamp() < $data_fim_sol->getTimestamp() && $this->reserva->getPeriodo()->getDataHoraInicial()->getTimestamp() < $data_fim_reti->getTimestamp()) {
                    $show_banner = '<strong style="color: #FF0000;">A reserva e o valor confirmados referem-se ao grupo A (b&aacute;sico sem ar), e no momento da retirada a pr&oacute;pria loja providenciar&aacute; upgrade para o grupo C (b&aacute;sico com ar e dh). Válido para reservas com retiradas at&eacute; 31/08/2017</strong>';
                }
            }
            $this->smarty->assign('show_banner', $show_banner);

            $valor_hora_carro = number_format(round(($this->reserva->getValorDiarias() / $this->reserva->getPeriodo()->getDias()) / $this->reserva->getLocadora()->getHoraExtra(), 2), 2, ",", "");
            $this->smarty->assign('valor_hora_carro', $valor_hora_carro);
            $this->smarty->assign('ano', date('Y'));
            $this->smarty->assign('reserva', $this->reserva);
            $voucher = $this->smarty->fetch('layum/voucher_carro.tpl');
        }
        return $voucher;
    }

    function voucher_carro_pdf($reserva = NULL)
    {
        $voucher  = NULL;
        if ($reserva) {
            $this->reserva = $this->aluguelcarros->showReservaCarro($reserva);
            $valor_hora_carro = number_format(round(($this->reserva->getValorDiarias() / $this->reserva->getPeriodo()->getDias()) / $this->reserva->getLocadora()->getHoraExtra(), 2), 2, ",", "");
            $this->smarty->assign('valor_hora_carro', $valor_hora_carro);
            $this->smarty->assign('ano', date('Y'));
            $this->smarty->assign('data_agora', date('d/m/Y H:i:s'));
            $this->smarty->assign('reserva', $this->reserva['objeto']);
            $voucher = $this->smarty->fetch('layum/voucher_carro_pdf.tpl');
        }
        return $voucher;
    }
}