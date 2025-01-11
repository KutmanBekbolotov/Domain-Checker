import React, { useState } from 'react';

const CreatePostPage = () => {
    const [formData, setFormData] = useState({
        title: '',
        body: '',
        image: null,
    });
    const [errors, setErrors] = useState([]);
    const [success, setSuccess] = useState('');

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setFormData({ ...formData, [name]: value });
    };

    const handleFileChange = (e) => {
        setFormData({ ...formData, image: e.target.files[0] });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setErrors([]);
        setSuccess('');

        const formDataToSend = new FormData();
        formDataToSend.append('title', formData.title);
        formDataToSend.append('body', formData.body);
        if (formData.image) {
            formDataToSend.append('image', formData.image);
        }

        try {
            const response = await fetch('/api/posts', {
                method: 'POST',
                body: formDataToSend,
            });

            if (response.ok) {
                setSuccess('Post added successfully!');
                setFormData({
                    title: '',
                    body: '',
                    image: null,
                });
            } else {
                const data = await response.json();
                setErrors(data.errors || ['Something went wrong']);
            }
        } catch (error) {
            setErrors(['Error connecting to the server']);
        }
    };

    return (
        <div style={{ padding: '20px' }}>
            <h1>Create New Post</h1>

            {errors.length > 0 && (
                <div>
                    <ul style={{ color: 'red' }}>
                        {errors.map((error, index) => (
                            <li key={index}>{error}</li>
                        ))}
                    </ul>
                </div>
            )}

            {success && <p style={{ color: 'green' }}>{success}</p>}

            <form onSubmit={handleSubmit} encType="multipart/form-data">
                <div style={{ marginBottom: '10px' }}>
                    <label htmlFor="title">Title:</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value={formData.title}
                        onChange={handleInputChange}
                        required
                    />
                </div>

                <div style={{ marginBottom: '10px' }}>
                    <label htmlFor="body">Body:</label>
                    <textarea
                        id="body"
                        name="body"
                        value={formData.body}
                        onChange={handleInputChange}
                        required
                    />
                </div>

                <div style={{ marginBottom: '10px' }}>
                    <label htmlFor="image">Image (optional):</label>
                    <input
                        type="file"
                        id="image"
                        name="image"
                        accept="image/*"
                        onChange={handleFileChange}
                    />
                </div>

                <button type="submit">Create Post</button>
            </form>

            <a href="/posts" style={{ display: 'block', marginTop: '20px' }}>
                Back to Posts
            </a>
        </div>
    );
};

export default CreatePostPage;