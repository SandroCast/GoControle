@extends('adminlte::page')

@section('title', 'GoControle')

@section('content_header')
    <h1><i class="fas fa-cube"></i> Alocar Item</h1>
@stop

@section('content')


    <style>
        .msg {
                background-color: #D4EDDA;
                color: #155724;
                border: 1px solid #C3E6CB;
                width: 100%;
                margin-bottom: 15px;
                text-align: center;
                padding: 10px;
        }
        #msg2 {
            background-color: #edd4d4;
            color: #ff0000;
            border: 1px solid #ffebeb;
            width: 100%;
            margin-bottom: 15px;
            text-align: center;
            padding: 10px;
        }
        .titulo {
            font-size: 14px;
            color: #333;
            font-weight: 600;
        }
        .codigo {
            padding: 5px 10px;
            font-size: 15px;
            color: #333;
            border: solid 1px rgb(196, 196, 196);
        }
        .codigo:focus {
            outline: none !important;
            border-color: #719ECE;
        }
        #qtd {
            width: 80px;
           
        }

        .bt_cancelar {
            text-decoration: none;
            font-size: 14px;
            margin: 0 30px;
            padding: 6px 12px;
            width: 100px;
            background-color: #EFEFEF;
            color: #444;
            border: solid 1px rgb(196, 196, 196);
        }
        .bt_cancelar:hover {
            background-color: #dddddd;
            color: rgb(0, 0, 0);
        }
        #lab_item{
            margin: 0px 20px 0px 63px; 
            
        }
        #in_item {
            width: 150px;
           
        }
        #end_info {
            color: #777;
        }

        @media(max-width: 970px) {

            #quebra_qtd{
                display: block !important;
                margin: 30px 0px;
                
            }
            #end_info {
                display: block !important;
                margin-top: 0px;
                margin-left: 137px;

            }
            #lab_qtd {

                margin-right: 18px !important;


            }

        }


    </style>

    @if(session('msg'))
    <p class="msg">{{ session('msg') }}</p>
    @endif
    @if(session('msg2'))
    <p class="msg" id="msg2">{{ session('msg2') }}</p>
    @endif


    <div class="card col-md-12">

        <form action="/estoque/armazenamento/alocar" method="GET" enctype="multipart/form-data">
            <div class="form-group m-4">
                <label id="lab_codigo" class="d-inline m-3 titulo" for="codigo">Endereço</label>
                @if($endereco && count($endereco) > 0)
                <input style="background-color: #E8F0FE;" type="text" class="d-inline codigo w-25" name="codigo" value="{{ $codigo }}" disabled>
                <a href="/estoque/armazenamento/alocar" class="bt_cancelar">Cancelar</a>

                <div id="end_info" class="d-inline">

                   {{ $endereco->first()->endereco }}
                    
                </div>

                <div class="form-group m-4">
                    <input type="text" style="display: none;" name="codigo" value="{{ $codigo }}">

                    <label id="lab_item" class="d-inline titulo" for="item">Item</label>

                    <input type="text" id="in_item" class="d-inline codigo" name="item" required autofocus>

                    <div id="quebra_qtd" class="d-inline">
                    <label id="lab_qtd" class="d-inline m-4 titulo" for="quantidade">Quantidade</label>
                    
                    <select name="quantidade" class="d-inline codigo" id="qtd">
            
                        <option value="120" selected>120</option>
                        <option value="119">119</option>
                        <option value="118">118</option>
                        <option value="117">117</option>
                        <option value="116">116</option>
                        <option value="115">115</option>
                        <option value="114">114</option>
                        <option value="113">113</option>
                        <option value="112">112</option>
                        <option value="111">111</option>
                        <option value="110">110</option>
                        <option value="109">109</option>
                        <option value="108">108</option>
                        <option value="107">107</option>
                        <option value="106">106</option>
                        <option value="105">105</option>
                        <option value="104">104</option>
                        <option value="103">103</option>
                        <option value="102">102</option>
                        <option value="101">101</option>
                        <option value="100">100</option>
                        <option value="99">99</option>
                        <option value="98">98</option>
                        <option value="97">97</option>
                        <option value="96">96</option>
                        <option value="95">95</option>
                        <option value="94">94</option>
                        <option value="93">93</option>
                        <option value="92">92</option>
                        <option value="91">91</option>
                        <option value="90">90</option>
                        <option value="89">89</option>
                        <option value="88">88</option>
                        <option value="87">87</option>
                        <option value="86">86</option>
                        <option value="85">85</option>
                        <option value="84">84</option>
                        <option value="83">83</option>
                        <option value="82">82</option>
                        <option value="81">81</option>
                        <option value="80">80</option>
                        <option value="79">79</option>
                        <option value="78">78</option>
                        <option value="77">77</option>
                        <option value="76">76</option>
                        <option value="75">75</option>
                        <option value="74">74</option>
                        <option value="73">73</option>
                        <option value="72">72</option>
                        <option value="71">71</option>
                        <option value="70">70</option>
                        <option value="69">69</option>
                        <option value="68">68</option>
                        <option value="67">67</option>
                        <option value="66">66</option>
                        <option value="65">65</option>
                        <option value="64">64</option>
                        <option value="63">63</option>
                        <option value="62">62</option>
                        <option value="61">61</option>
                        <option value="60">60</option>
                        <option value="59">59</option>
                        <option value="58">58</option>
                        <option value="57">57</option>
                        <option value="56">56</option>
                        <option value="55">55</option>
                        <option value="54">54</option>
                        <option value="53">53</option>
                        <option value="52">52</option>
                        <option value="51">51</option>
                        <option value="50">50</option>
                        <option value="49">49</option>
                        <option value="48">48</option>
                        <option value="47">47</option>
                        <option value="46">46</option>
                        <option value="45">45</option>
                        <option value="44">44</option>
                        <option value="43">43</option>
                        <option value="42">42</option>
                        <option value="41">41</option>
                        <option value="40">40</option>
                        <option value="39">39</option>
                        <option value="38">38</option>
                        <option value="37">37</option>
                        <option value="36">36</option>
                        <option value="35">35</option>
                        <option value="34">34</option>
                        <option value="33">33</option>
                        <option value="32">32</option>
                        <option value="31">31</option>
                        <option value="30">30</option>
                        <option value="29">29</option>
                        <option value="28">28</option>
                        <option value="27">27</option>
                        <option value="26">26</option>
                        <option value="25">25</option>
                        <option value="24">24</option>
                        <option value="23">23</option>
                        <option value="22">22</option>
                        <option value="21">21</option>
                        <option value="20">20</option>
                        <option value="19">19</option>
                        <option value="18">18</option>
                        <option value="17">17</option>
                        <option value="16">16</option>
                        <option value="15">15</option>
                        <option value="14">14</option>
                        <option value="13">13</option>
                        <option value="12">12</option>
                        <option value="11">11</option>
                        <option value="10">10</option>
                        <option value="9">9</option>
                        <option value="8">8</option>
                        <option value="7">7</option>
                        <option value="6">6</option>
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    
                    </select>


                <input class="bt_cancelar" type="submit" value="Alocar">

                </div>

                @else
                <input type="text" class="d-inline codigo w-25" name="codigo" value="{{ $codigo }}" autofocus>
                @endif
            

            </div>
                
        </form>

    </div>


@stop


@section('footer')      
    <strong>Copyright © 2014-2022 <a href="https://goeyewear.com.br/">GO Eyewear</a>.</strong>
    Todos direitos reservados.
    <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0.0
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop