<?php
session_start();
$page_title = "Diagnóstico Tardio";
include 'header.php';
?>
<style>
body {
    background: linear-gradient(-45deg, #3A1075, #5b2aad, #7b3fcf, #3A1075);
    background-size: 400% 400%;
    animation: gradientBG 15s ease infinite;
    color: white;
    min-height: 100vh;
    margin: 0;
    padding: 0;
}

@keyframes gradientBG {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
}

.hero, .content {
    background-color: rgba(58, 16, 117, 0.8);
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 8px 20px rgba(58,16,117,0.3);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    color: white;
    margin-bottom: 30px;
}

.hero:hover, .content:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(58,16,117,0.6);
}

/* Estilo para links */
a {
    color: #d6b3ff;
    text-decoration: none;
    transition: color 0.3s ease;
}

a:hover {
    color: #f3e1ff;
    text-decoration: underline;
}
</style>

<div class="container mt-4">
    <div class="hero">
        <h1><?php echo $page_title; ?></h1>
        <p>Entenda a importância do diagnóstico tardio e seus impactos na vida de uma pessoa autista.</p>
    </div>

    <div class="content mt-4">
        <h2>O que é um diagnóstico tardio?</h2>
        <p>O diagnóstico tardio ocorre quando uma pessoa autista descobre sua condição na adolescência ou idade adulta. Muitas vezes, isso acontece devido à falta de informação, estereótipos sobre o autismo, ou porque seus traços foram mascarados ao longo da vida.</p>
        <p>Muitas pessoas, especialmente mulheres e pessoas neurodivergentes com altos níveis de camuflagem social, passam anos sem um diagnóstico adequado. Isso pode levar ao desenvolvimento de quadros associados, como ansiedade, depressão e exaustão crônica.</p>
        <p>Receber o diagnóstico, mesmo tardiamente, pode representar um alívio, pois ajuda a explicar experiências anteriores e permite que a pessoa busque apoio mais alinhado às suas necessidades.</p>
        <div class="text-center mt-3">
            <img src="terapia.jpeg" class="img-fluid rounded" alt="Imagem ilustrativa">
        </div>
        <p class="mt-4"><strong>Referências:</strong></p>
        <ul>
            <li>Associação Brasileira de Psiquiatria (ABP) – <a href="https://www.abp.org.br/post/autismo-na-vida-adulta" target="_blank">https://www.abp.org.br/post/autismo-na-vida-adulta</a></li>
            <li>Revista Autismo – <a href="https://www.revistaautismo.com.br/diagnostico/autistas-diagnosticados-na-vida-adulta/" target="_blank">https://www.revistaautismo.com.br/diagnostico/autistas-diagnosticados-na-vida-adulta/</a></li>
            <li>DSM-5 – Manual Diagnóstico e Estatístico de Transtornos Mentais – APA (American Psychiatric Association)</li>
        </ul>
    </div>

    <div class="content mt-4">
        <h2>Especialistas que podem diagnosticar</h2>
        <p>O diagnóstico pode ser feito por diferentes profissionais da área da saúde, como:</p>
        <ul>
            <li>Neurologistas</li>
            <li>Psiquiatras</li>
            <li>Psicólogos especializados em neurodesenvolvimento</li>
        </ul>
        <p>Esses profissionais utilizam entrevistas clínicas, observações comportamentais e critérios diagnósticos estabelecidos por manuais internacionais como o DSM-5 ou CID-11.</p>
    </div>

    <div class="content mt-4">
        <h2>Impactos do diagnóstico tardio</h2>
        <p>Descobrir o autismo tardiamente pode trazer desafios e benefícios. Alguns dos impactos incluem:</p>
        <ul>
            <li>Melhor compreensão da própria identidade</li>
            <li>Possibilidade de buscar adaptações e suporte adequado</li>
            <li>Processamento emocional da descoberta</li>
            <li>Reconstrução de sua história sob uma nova perspectiva</li>
        </ul>
        <p>Apesar dos desafios, muitas pessoas relatam que o diagnóstico tardio representa um ponto de virada positivo, possibilitando maior autoaceitação, pertencimento à comunidade autista e melhora na qualidade de vida.</p>
    </div>
</div>

<?php include 'footer.php'; ?>
