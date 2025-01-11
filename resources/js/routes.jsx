import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import HomePage from './pages/HomePage';
import CurrencyPage from './pages/CurrencyPage';
import CreatePostPage from './pages/PostsPage';

const AppRoutes = () => {
    return (
        <Router>
            <Routes>
                <Route path="/" element={<HomePage />} />
                <Route path="/currency" element={<CurrencyPage />} />
                <Route path="/posts" element={<CreatePostPage/>} />
            </Routes>
        </Router>
    );
};

export default AppRoutes;