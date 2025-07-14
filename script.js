    // --- Dados dos Posts do Blog de F1 ---
const blogPostsF1 = [
    {
        codigo: 'F1-B001',
        titulo: 'Análise: O Dominio de Verstappen na Temporada 2024',
        descricao: 'Uma análise aprofundada sobre como Max Verstappen e a Red Bull Racing conquistaram o título de 2024.',
        imagem: 'max.jpeg', // Imagem do post
        tags: ['Análise', 'Temporada 2024', 'Max Verstappen', 'Red Bull'],
        data: '2025-07-01'
    },
    {
        codigo: 'F1-B002',
        titulo: 'Os 5 Maiores Circuitos Históricos da F1',
        descricao: 'Descubra os circuitos mais icônicos e desafiadores que marcaram a história da Fórmula 1.',
        imagem: 'circuitos.jpeg',
        tags: ['Circuitos', 'História', 'Spa', 'Monza', 'Mônaco'],
        data: '2025-06-25'
    },
    {
        codigo: 'F1-B003',
        titulo: 'Lendas da F1: Ayrton Senna e Seu Legado Eterno',
        descricao: 'Uma homenagem a Ayrton Senna, o mestre da chuva e um dos maiores pilotos de todos os tempos.',
        imagem: 'senna.jpeg',
        tags: ['Pilotos', 'Lendas', 'Ayrton Senna', 'História'],
        data: '2025-06-18'
    },
    {
        codigo: 'F1-B004',
        titulo: 'Como a Aerodinâmica Impacta os Carros de F1 Modernos',
        descricao: 'Entenda a ciência por trás do design aerodinâmico e sua importância na performance dos carros atuais.',
        imagem: 'formula 1.jpeg',
        tags: ['Carros', 'Tecnologia', 'Engenharia'],
        data: '2025-06-10'
    },
    {
        codigo: 'F1-B005',
        titulo: 'GP do Brasil: Momentos Inesquecíveis em Interlagos',
        descricao: 'Relembre as corridas mais emocionantes e os momentos memoráveis do Grande Prêmio do Brasil.',
        imagem: 'interlagos.jpeg',
        tags: ['Circuitos', 'GP do Brasil', 'Interlagos', 'História'],
        data: '2025-05-30'
    },
    {
        codigo: 'F1-B006',
        titulo: 'Os Desafios da Ferrari em 2024',
        descricao: 'Uma análise sobre os altos e baixos da Ferrari na última temporada e o que esperar do futuro.',
        imagem: 'ferrari.jpeg',
        tags: ['Equipes', 'Ferrari', 'Análise', 'Temporada 2024'],
        data: '2025-05-20'
    }
];

// --- Funções Genéricas de Renderização e Filtro ---
function renderCards(containerElement, dataArray) {
    containerElement.innerHTML = ''; // Limpa o conteúdo atual
    dataArray.forEach(item => {
        const card = document.createElement('div');
        card.classList.add('card');
        
        card.innerHTML = `
            <img src="${item.imagem}" alt="${item.titulo}">
            <h3>${item.titulo}</h3>
            <p>${item.descricao}</p>
            <p class="date"><strong>Data:</strong> ${item.data}</p>
            <p class="tags"><strong>Tags:</strong> ${item.tags.map(tag => `<span>${tag}</span>`).join('')}</p>
        `;
        containerElement.appendChild(card);
    });
}

function filterContent(dataArray, inputElement, checkboxElement) {
    const textoBusca = inputElement.value.toLowerCase();
    const somenteTitulo = checkboxElement.checked;

    return dataArray.filter(item => {
        const tituloItem = item.titulo ? item.titulo.toLowerCase() : '';

        if (somenteTitulo) {
            return tituloItem.includes(textoBusca);
        } else {
            // Verifica em todos os atributos string do objeto (título, descrição, tags)
            const searchableText = `${item.titulo} ${item.descricao} ${item.tags.join(' ')}`.toLowerCase();
            return searchableText.includes(textoBusca);
        }
    });
}

// --- Lógica para cada página ---

// Lógica para a Página Inicial (index.html)
document.addEventListener('DOMContentLoaded', () => {
    const latestBlogPostsContainer = document.getElementById('latest-blog-posts-container');

    if (latestBlogPostsContainer) {
        // Exibe os 3 últimos posts na homepage (ordem decrescente de data)
        const sortedPosts = [...blogPostsF1].sort((a, b) => new Date(b.data) - new Date(a.data));
        renderCards(latestBlogPostsContainer, sortedPosts.slice(0, 3));
    }
});

// Lógica para a Página do Blog (blog.html)
document.addEventListener('DOMContentLoaded', () => {
    const containerBlogPosts = document.getElementById('container-blog-posts');
    const inputFiltroBlog = document.getElementById('filtro-blog');
    const checkboxTituloBlog = document.getElementById('filtrarPorTituloBlog');

    if (containerBlogPosts) { // Garante que estamos na página do blog
        // Renderiza todos os posts, ordenados por data (mais recentes primeiro)
        const sortedPosts = [...blogPostsF1].sort((a, b) => new Date(b.data) - new Date(a.data));
        renderCards(containerBlogPosts, sortedPosts);

        const applyFilterBlog = () => {
            const filtered = filterContent(blogPostsF1, inputFiltroBlog, checkboxTituloBlog);
            // Renderiza posts filtrados, mantendo a ordem por data
            const sortedFilteredPosts = [...filtered].sort((a, b) => new Date(b.data) - new Date(a.data));
            renderCards(containerBlogPosts, sortedFilteredPosts);
        };

        inputFiltroBlog.addEventListener('input', applyFilterBlog);
        checkboxTituloBlog.addEventListener('change', applyFilterBlog);
    }
});

// Marca o link de navegação ativo
document.addEventListener('DOMContentLoaded', () => {
    const currentPage = window.location.pathname.split('/').pop();
    const navLinks = document.querySelectorAll('.main-nav ul li a');

    navLinks.forEach(link => {
        const linkHref = link.getAttribute('href');
        if (linkHref === currentPage) {
            link.classList.add('active');
        } else if (currentPage === '' && linkHref === 'index.html') { // Para a página inicial
            link.classList.add('active');
        }
    });
});