<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects Directory</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Geist', sans-serif;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
    </style>
</head>

<body class="bg-black text-gray-100 min-h-screen flex flex-col items-center">
    <main class="container mx-auto px-4 mt-8 fade-in">
        <h1 class="text-3xl font-bold">📁 Laragon Projects Directory</h1>
        <br>
        <div class="bg-[#0a0a0a] border-[1px] border-[#2d2d2d] shadow-lg rounded-lg p-6">
            <div class="mb-4 relative">
                <input type="text" id="searchInput" placeholder="Search projects..."
                    class="w-full bg-transparent text-gray-200 border-[1px] border-[#2d2d2d] placeholder-gray-600 rounded-lg px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-white" />
                <div class="absolute top-1/2 left-3 transform -translate-y-1/2 text-gray-400">
                    <!-- Search Icon -->
                    <svg data-testid="geist-icon" height="16" stroke-linejoin="round" viewBox="0 0 16 16" width="16"
                        style="color: currentcolor;">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.5 6.5C1.5 3.73858 3.73858 1.5 6.5 1.5C9.26142 1.5 11.5 3.73858 11.5 6.5C11.5 9.26142 9.26142 11.5 6.5 11.5C3.73858 11.5 1.5 9.26142 1.5 6.5ZM6.5 0C2.91015 0 0 2.91015 0 6.5C0 10.0899 2.91015 13 6.5 13C8.02469 13 9.42677 12.475 10.5353 11.596L13.9697 15.0303L14.5 15.5607L15.5607 14.5L15.0303 13.9697L11.596 10.5353C12.475 9.42677 13 8.02469 13 6.5C13 2.91015 10.0899 0 6.5 0Z"
                            fill="currentColor"></path>
                    </svg>
                </div>
            </div>
            <ul id="projectList" class="divide-y divide-gray-700">
                <?php
                $dir = './';
                $files = array_diff(scandir($dir), ['.', '..']);
                foreach ($files as $file):
                    if (is_dir($file)):
                        $createdAt = date("F d, Y", filemtime($file));
                        ?>
                        <li class="py-4 project-item flex justify-between items-center">
                            <a href="<?= $file ?>/"
                                class="text-xl text-white font-medium hover:underline transition-all duration-200">
                                <?= $file ?>
                            </a>
                            <span class="text-gray-400 text-sm"><?= $createdAt ?></span>
                        </li>
                        <?php
                    endif;
                endforeach;
                ?>
            </ul>
            <br>
            <p id="noResults" class="text-gray-500 text-center text-lg mt-4 hidden">No results found.</p>
        </div>
    </main>
    <br>
    <footer class="mt-auto w-full py-4 text-center fade-in">
        <p class="text-sm text-gray-400">AMCC Backend 2024</p>
    </footer>
    <script>
        const searchInput = document.getElementById('searchInput');
        const projectList = document.getElementById('projectList');
        const noResults = document.getElementById('noResults');
        const projects = document.querySelectorAll('.project-item');

        searchInput.addEventListener('input', () => {
            const filter = searchInput.value.toLowerCase();
            let hasResults = false;

            projects.forEach(project => {
                const text = project.textContent.toLowerCase();
                if (text.includes(filter)) {
                    project.style.display = '';
                    hasResults = true;
                } else {
                    project.style.display = 'none';
                }
            });

            if (hasResults) {
                noResults.classList.add('hidden');
            } else {
                noResults.classList.remove('hidden');
            }
        });
    </script>
</body>

</html>