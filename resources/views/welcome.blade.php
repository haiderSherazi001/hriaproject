<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRIA Contributor Network</title>
    <style>
        :root {
            --primary: #7a4f22;
            --primary-hover: #5f3b17;
            --bg-light: #fefaf6;
            --text-dark: #111827;
            --text-muted: #6b7280;
            --border: #e4d6c4;
        }

        body { 
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; 
            background-color: var(--bg-light); 
            color: var(--text-dark);
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        /* Navigation */
        .navbar {
            background: #ffffff;
            border-bottom: 1px solid var(--border);
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand-name {
            font-size: 22px;
            font-weight: 800;
            color: var(--primary);
            text-decoration: none;
            letter-spacing: 0.5px;
        }
        
        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
            padding: 8px 20px;
            border-radius: 99px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: 0.2s;
        }

        .btn-outline:hover { background: var(--primary); color: white; }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 100px 20px;
            background: linear-gradient(135deg, #f7f1e8 0%, #efe0cc 100%);
            border-bottom: 1px solid var(--border);
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
            color: #23180e;
            line-height: 1.2;
        }

        .hero p {
            font-size: 18px;
            color: #4a3f35;
            max-width: 750px;
            margin: 0 auto 40px auto;
        }

        .btn-main {
            background: var(--primary);
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 8px;
            font-size: 18px;
            transition: 0.2s;
            box-shadow: 0 4px 15px rgba(122, 79, 34, 0.2);
            display: inline-block;
        }

        .btn-main:hover { background: var(--primary-hover); transform: translateY(-2px); }

        /* The Mission Grid */
        .mission-section {
            padding: 80px 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-header h2 {
            font-size: 32px;
            color: var(--primary);
            margin: 0 0 15px 0;
        }

        .section-header p {
            color: var(--text-muted);
            max-width: 600px;
            margin: 0 auto;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .card {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 16px;
            border: 1px solid var(--border);
            box-shadow: 0 4px 6px rgba(0,0,0,0.02);
            transition: transform 0.2s;
        }

        .card:hover { transform: translateY(-5px); }

        .card-icon { 
            font-size: 40px; 
            margin-bottom: 20px;
            background: #fdf8f3;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: var(--primary);
        }

        .card h3 { margin: 0 0 15px 0; font-size: 22px; color: #2d2418; }
        .card p { margin: 0; font-size: 15px; color: var(--text-muted); }

        /* Footer CTA */
        .cta-footer {
            background: #23180e;
            color: white;
            text-align: center;
            padding: 60px 20px;
        }

        .cta-footer h2 { margin: 0 0 20px 0; }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="/" class="brand-name">Hizb Ur Rehman Academy</a>
        <div>
            <a href="/login" class="btn-outline">Admin Login</a>
        </div>
    </nav>

    <header class="hero">
        <h1>Help Us Shape the Future of Education</h1>
        <p>We are building an institution that combines a strong modern academic foundation with deep Islamic education. Join our network of professionals, students, and volunteers to make this vision a reality.</p>
        <a href="/join" class="btn-main">Become a Contributor &rarr;</a>
    </header>

    <section class="mission-section">
        <div class="section-header">
            <h2>The Academy's Vision</h2>
            <p>We are actively seeking experts, mentors, and dedicated individuals who can contribute to these four core pillars of our growth plan.</p>
        </div>

        <div class="grid">
            <div class="card">
                <div class="card-icon">📚</div>
                <h3>Academic Excellence</h3>
                <p>Help us build a system focused on exceptional board results. We need mentors who can guide students from 6th grade through BS level with strict tracking and weekly reviews.</p>
            </div>
            <div class="card">
                <div class="card-icon">🕌</div>
                <h3>Islamic Integration</h3>
                <p>Support our goal of seamlessly blending modern curriculum with dedicated Hifz and Dars-e-Nizami programs, fostering both spiritual and worldly growth.</p>
            </div>
            <div class="card">
                <div class="card-icon">🎯</div>
                <h3>Competitive Exam Prep</h3>
                <p>We are launching career-oriented training. If you have experience, help us build our students' analytical skills, logical reasoning, and awareness for PPSC/FPSC exams.</p>
            </div>
            <div class="card">
                <div class="card-icon">🌍</div>
                <h3>Educational Outreach</h3>
                <p>Join our village admission drives and Tehsil awareness camps. We need volunteers to help us expand our reach and bridge the gap between rural and urban education.</p>
            </div>
        </div>
    </section>

    <footer class="cta-footer">
        <h2>Ready to make an impact?</h2>
        <p style="margin-bottom: 30px; color: #a89f91;">Whether through teaching, mentoring, IT support, or fundraising, your contribution matters.</p>
        <a href="/join" class="btn-main" style="background: white; color: #23180e;">Register as a Volunteer</a>
    </footer>

</body>
</html>