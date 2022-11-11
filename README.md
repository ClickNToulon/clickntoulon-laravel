[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]


<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/ClickNToulon/clickntoulon-laravel">
    <img src="http://da.clickntoulon.fr/images/clickntoulon.svg" alt="Logo" width="auto" height="80">
  </a>

<h3 align="center">ClickNToulon</h3>

  <p align="center">
    ClickNToulon is an online Click&Collect plateform
    ·
    <a href="https://github.com/ClickNToulon/clickntoulon-laravel/issues">Report Bug</a>
    ·
    <a href="https://github.com/ClickNToulon/clickntoulon-laravel/issues">Request Feature</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

ClickNToulon is an association that manages the e-commerce platform of the same name. This platform was imagined by two computer science students in November 2020, to help retailers in Toulon overcome the health crisis due to successive lockdowns.

### Built With

* [![Vue][Vue.js]][Vue-url]
* [![Laravel][Laravel.com]][Laravel-url]

<!-- GETTING STARTED -->
## Getting Started

### Prerequisites

The project is based on the Laravel Framework so you'll need Composer, NodeJS and npm installed.
* npm

  ```sh
  npm install npm@latest -g
  ```
 * Composer

    ```sh
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"
    ```

### Installation

1. Clone the repo

   ```sh
   git clone https://github.com/ClickNToulon/clickntoulon-laravel.git
   ```
2. Install Composer Dependencies

    ```sh
    composer install
    ```
3. Install NPM packages

   ```sh
   npm install
   ```
4. Launch the web server bundled with Laravel

   ```sh
   php artisan serve
   ```
<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.

<!-- CONTACT -->
## Contact

ClickNToulon - [@ClickNToulon](https://twitter.com/clickntoulon) - contact@clickntoulon.fr

Project Link: [https://github.com/ClickNToulon/clickntoulon-laravel](https://github.com/ClickNToulon/clickntoulon-laravel)

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/ClickNToulon/clickntoulon-laravel.svg
[contributors-url]: https://github.com/ClickNToulon/clickntoulon-laravel/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/ClickNToulon/clickntoulon-laravel.svg
[forks-url]: https://github.com/ClickNToulon/clickntoulon-laravel/network/members
[stars-shield]: https://img.shields.io/github/stars/ClickNToulon/clickntoulon-laravel.svg
[stars-url]: https://github.com/ClickNToulon/clickntoulon-laravel/stargazers
[issues-shield]: https://img.shields.io/github/issues/ClickNToulon/clickntoulon-laravel.svg
[issues-url]: https://github.com/ClickNToulon/clickntoulon-laravel/issues
[license-shield]: https://img.shields.io/github/license/ClickNToulon/clickntoulon-laravel.svg
[license-url]: https://github.com/ClickNToulon/clickntoulon-laravel/blob/main/LICENSE
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/clickntoulon
[Vue.js]: https://img.shields.io/badge/Vue.js-35495E?logo=vuedotjs&logoColor=4FC08D
[Vue-url]: https://vuejs.org/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
