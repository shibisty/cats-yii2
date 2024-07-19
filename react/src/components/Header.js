import React from 'react'

const Header = () => (
  <header className='header'>
    <div className='header__container'>
      <div className='header__logo'>
        <img src='/dist/images/logo.svg' alt='Logo' width={80} height={50} />
        <span>Школа котиків</span>
      </div>
      <nav className='header__nav'>
        <ul className='header__nav-links'>
          <li>
            <a href='#1'>Вступ</a>
          </li>
          <li>
            <a href='#2'>Вартість</a>
          </li>
          <li>
            <a href='#3'>Як ми вчимо</a>
          </li>
          <li>
            <a href='#4'>Про школу</a>
          </li>
          <li>
            <a href='#5'>Контакти</a>
          </li>
        </ul>
      </nav>
      <div className='header__controls'>
        <div className='langs'>
          <span className='langs__active'>укр</span>
          <span className='langs__arr'>
            <svg
              width='12'
              height='7'
              viewBox='0 0 12 7'
              fill='none'
              xmlns='http://www.w3.org/2000/svg'
            >
              <path
                d='M1 1.5L6 5.5L11 1.5'
                stroke='#2E4054'
                strokeWidth='2'
                strokeLinecap='round'
              />
            </svg>
          </span>
          <div className='langs__list'></div>
        </div>
        <div className='header__buttons'>
          <button className='button button__logout'>Вийти</button>
        </div>
        <div className='avatar'>
          <img src='/dist/images/avatar.png' alt='Avatar' width={50} height={50} />
        </div>
      </div>
    </div>
  </header>
)

export default Header
