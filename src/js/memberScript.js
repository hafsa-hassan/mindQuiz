document.addEventListener('DOMContentLoaded', function() {

    // member menu-toggle
    const memberMenuToggle = document.querySelector('.member-menu-toggle');
    const memberSideOverlay = document.querySelector('.member-side-overlay');
    const memberSideBar = document.querySelector('.member-side-bar');

    
    if(memberMenuToggle && memberSideBar&& memberSideOverlay){
        function togglememberSidebar() {
            memberSideBar.classList.toggle('open');
            memberSideOverlay.classList.toggle('open');
        }

        memberMenuToggle.addEventListener('click', togglememberSidebar);
        memberSideOverlay.addEventListener('click', togglememberSidebar);
    }

    //pagination
    const pageNumbers = document.querySelector(".page-number");
    const tableTr = document.querySelectorAll("tbody tr");
    const prevPage = document.getElementById("prev");
    const nextPage = document.getElementById("next");

    if (pageNumbers && tableTr && prevPage && nextPage) {
        const tableLimit = 10;
        const tableCount = Math.ceil(tableTr.length / tableLimit);
        let currentPage = 1;

        const displayTableNumbers = (index) =>{
            const pagenumber = document.createElement("a");
            pagenumber.innerText = index;
            pagenumber.setAttribute('href', "#");
            pagenumber.setAttribute("index", index);
            pagenumber.classList.add("link-page");
            pageNumbers.appendChild(pagenumber);
        };

        const getTableNumbers = () =>{
            for(let i=1; i <= tableCount; i++){
                displayTableNumbers(i);
            }
        };

        const disableButtons = (button) =>{
            button.classList.add("disabled");
            button.setAttribute("disabled", true);
        };

        const enableButtons = (button) =>{
            button.classList.remove("disabled");
            button.removeAttribute("disabled");
        };

        const controlMoveButton = () =>{
            if (currentPage === 1){
                disableButtons(prevPage);
            } else {
                enableButtons(prevPage);
            }

            if(currentPage === tableCount ){
                disableButtons(nextPage);
            }else {
                enableButtons(nextPage);
            }
        };

        const activePageLink = () =>{
            document.querySelectorAll('.page-number a').forEach((button) => {
                button.classList.remove("active");
                const pageIndex = Number(button.getAttribute("index"));
                if (pageIndex === currentPage){
                    button.classList.add("active");
                }
            });
        };

        const displayArticles = () => {
            const start = (currentPage - 1) * tableLimit;
            const end = currentPage * tableLimit;

            tableTr.forEach((item, index) => {
                if (index >= start && index < end) {
                    item.style.display = "table-row";
                } else {
                    item.style.display = "none";
                }
            });
        };

        const setCurrentPage = (pageNum) => {
            currentPage = pageNum;

            activePageLink();
            controlMoveButton();
            displayArticles();

        };

        window.addEventListener('load', () => {
            getTableNumbers();
            setCurrentPage(1);

        });

        prevPage.addEventListener('click', () =>{
            setCurrentPage(currentPage - 1);
        });

        nextPage.addEventListener('click', () =>{
            setCurrentPage(currentPage + 1);
        });

        pageNumbers.addEventListener('click', (event) =>{
            if(event.target.classList.contains('link-page')){
                setCurrentPage(parseInt(event.target.getAttribute('index')))
            }
        });
    }

});