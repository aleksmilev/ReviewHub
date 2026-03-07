import { Component } from 'react'
import './header.css'

class Header extends Component {
    isAdmin = () => {
        return false;
    }

    isLoggedIn = () => {
        return false;
    }

    render() {
        const loggedIn = this.isLoggedIn();
        const isAdmin = this.isAdmin();

        return (
            <header className="header">
                <div className="header-container">
                    <div className="header-content">
                        <a href="/home" className="logo">
                            <div className="logo-icon">R</div>
                            <span>ReviewHub</span>
                        </a>
                        
                        <nav className="nav">
                            <ul className="nav-links">
                                <li><a href="/home" className="nav-link active">Home</a></li>
                                <li><a href="/review/company" className="nav-link">Companies</a></li>
                                <li><a href="/review" className="nav-link">Reviews</a></li>
                            </ul>
                        </nav>
                        
                        <form method="POST" action="/review/search" className="search-container">
                            <button type="submit" className="search-icon-button" aria-label="Search companies">
                                <svg className="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                            <input type="search" name="query" className="search-input" placeholder="Search companies..." aria-label="Search companies" />
                        </form>
                        
                        <div className="user-actions">
                            {!loggedIn ? (
                                <>
                                    <a href="/user/login" className="btn btn-outline">
                                        <span className="btn-text">Login</span>
                                    </a>
                                    <a href="/user/register" className="btn btn-primary">
                                        <span className="btn-text">Sign Up</span>
                                    </a>
                                </>
                            ) : (
                                <a href="/user/profile" className="user-avatar">
                                    {isAdmin ? 'A' : 'U'}
                                </a>
                            )}
                            <button className="mobile-menu-toggle" aria-label="Toggle menu">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </header>
        )
    }
}

export default Header
