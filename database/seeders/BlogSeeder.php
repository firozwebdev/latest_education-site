<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'The Future of Online Education: Trends to Watch in 2025',
                'excerpt' => 'Explore the emerging trends shaping the future of online education and how they will impact learners worldwide.',
                'content' => '<p>The landscape of online education is rapidly evolving, with new technologies and methodologies transforming how we learn. From AI-powered personalized learning paths to immersive virtual reality classrooms, the future holds exciting possibilities for students and educators alike.</p><p>One of the most significant trends is the integration of artificial intelligence in learning platforms. AI algorithms can now analyze student performance data to create customized learning experiences, adapting content difficulty and pacing to individual needs.</p><p>Virtual and augmented reality technologies are also making waves in online education. Students can now participate in virtual field trips, conduct experiments in simulated laboratories, and collaborate with peers in immersive 3D environments.</p><p>As we look toward 2025, the focus is shifting from mere content delivery to creating engaging, interactive learning experiences that prepare students for the challenges of tomorrow.</p>',
                'author_name' => 'Dr. Sarah Johnson',
                'category' => 'Education Trends',
                'tags' => ['online learning', 'AI', 'VR', 'future education'],
                'read_time' => 5,
                'views_count' => 1250,
                'is_published' => true,
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'How to Choose the Right University for Your Career Goals',
                'excerpt' => 'A comprehensive guide to selecting the perfect university that aligns with your career aspirations and personal growth.',
                'content' => '<p>Choosing the right university is one of the most important decisions you\'ll make in your academic journey. With thousands of institutions worldwide, it\'s crucial to approach this decision strategically.</p><p>Start by clearly defining your career goals. What industry do you want to work in? What skills do you need to develop? Research shows that students who have a clear career vision are more likely to succeed academically and professionally.</p><p>Consider factors such as program accreditation, faculty expertise, research opportunities, and industry connections. Don\'t forget to evaluate campus culture, location preferences, and financial considerations.</p><p>Remember, the "best" university is the one that provides the environment and resources that will help you achieve your specific goals and become the professional you aspire to be.</p>',
                'author_name' => 'Prof. Michael Chen',
                'category' => 'Career Guidance',
                'tags' => ['university selection', 'career planning', 'higher education'],
                'read_time' => 7,
                'views_count' => 890,
                'is_published' => true,
                'published_at' => now()->subDays(14),
            ],
            [
                'title' => 'The Benefits of Studying Abroad: A Life-Changing Experience',
                'excerpt' => 'Discover how studying abroad can transform your perspective, enhance your skills, and open doors to global opportunities.',
                'content' => '<p>Studying abroad offers unparalleled opportunities for personal growth, cultural immersion, and professional development. In today\'s interconnected world, international experience has become a valuable asset in the job market.</p><p>Beyond academic learning, students gain invaluable life skills such as adaptability, cultural sensitivity, and independent problem-solving. Living in a foreign country challenges you to step outside your comfort zone and develop resilience.</p><p>Language acquisition happens naturally through daily interactions, and students often return home with fluency in additional languages. The networking opportunities are also significant, connecting you with peers from diverse backgrounds who can become lifelong friends and professional contacts.</p><p>Many employers actively seek candidates with international experience, recognizing that studying abroad develops the global mindset needed in today\'s business environment.</p>',
                'author_name' => 'Emma Rodriguez',
                'category' => 'Study Abroad',
                'tags' => ['international education', 'cultural exchange', 'personal development'],
                'read_time' => 6,
                'views_count' => 1450,
                'is_published' => true,
                'published_at' => now()->subDays(21),
            ],
            [
                'title' => 'Mastering Time Management: Essential Skills for Student Success',
                'excerpt' => 'Learn proven strategies for effective time management that will help you balance academics, extracurricular activities, and personal life.',
                'content' => '<p>Effective time management is the cornerstone of academic success. With competing demands on your time, developing strong organizational skills is essential for maintaining balance and achieving your goals.</p><p>The first step is creating a realistic schedule that allocates time for classes, study sessions, meals, exercise, and leisure activities. Use digital tools like calendar apps and task management software to stay organized.</p><p>Prioritization is key. Learn to distinguish between urgent tasks and important long-term goals. The Eisenhower Matrix can help you categorize tasks and focus on what truly matters.</p><p>Remember to build in buffer time for unexpected events and regular breaks to prevent burnout. Consistent sleep schedules and healthy eating habits also contribute to better time management by maintaining your energy levels.</p><p>Regular review and adjustment of your time management system ensures it continues to serve your evolving needs throughout your academic journey.</p>',
                'author_name' => 'Dr. James Wilson',
                'category' => 'Student Life',
                'tags' => ['time management', 'productivity', 'study skills'],
                'read_time' => 8,
                'views_count' => 2100,
                'is_published' => true,
                'published_at' => now()->subDays(28),
            ],
            [
                'title' => 'The Rise of Micro-Credentials: Revolutionizing Professional Development',
                'excerpt' => 'Explore how micro-credentials are changing the way professionals upskill and demonstrate their expertise in the modern workplace.',
                'content' => '<p>Micro-credentials represent a paradigm shift in professional development, offering flexible, targeted learning opportunities that fit into busy schedules. Unlike traditional degrees, these bite-sized qualifications focus on specific skills and competencies.</p><p>Employers increasingly value micro-credentials because they provide clear evidence of practical skills. Platforms like Coursera, edX, and LinkedIn Learning have made it easy to earn recognized credentials in high-demand areas.</p><p>The flexibility of micro-credentials allows professionals to upskill without committing to lengthy degree programs. This approach supports lifelong learning and career pivots in our rapidly changing job market.</p><p>As the workplace continues to evolve, micro-credentials are becoming essential for staying competitive. They bridge the gap between formal education and practical workplace requirements, making professional development more accessible and relevant.</p>',
                'author_name' => 'Lisa Thompson',
                'category' => 'Professional Development',
                'tags' => ['micro-credentials', 'professional development', 'lifelong learning'],
                'read_time' => 6,
                'views_count' => 980,
                'is_published' => true,
                'published_at' => now()->subDays(35),
            ],
            [
                'title' => 'Mental Health Matters: Supporting Student Well-being',
                'excerpt' => 'Understanding the importance of mental health in academic success and learning strategies to maintain balance during your studies.',
                'content' => '<p>Student mental health has become a critical concern in higher education. The pressures of academic performance, social expectations, and future uncertainties can take a significant toll on well-being.</p><p>Universities are increasingly recognizing the importance of mental health support services. Counseling centers, peer support programs, and wellness initiatives are becoming standard offerings on campuses worldwide.</p><p>Students should prioritize self-care practices such as regular exercise, adequate sleep, healthy eating, and mindfulness activities. Building strong social connections and knowing when to seek professional help are also crucial.</p><p>Educational institutions have a responsibility to create supportive environments that promote mental wellness. This includes reducing stigma around mental health issues and providing accessible resources for all students.</p><p>By addressing mental health proactively, we can create healthier, more productive learning environments that support long-term academic and personal success.</p>',
                'author_name' => 'Dr. Rachel Green',
                'category' => 'Student Wellness',
                'tags' => ['mental health', 'student wellness', 'well-being'],
                'read_time' => 7,
                'views_count' => 1650,
                'is_published' => true,
                'published_at' => now()->subDays(42),
            ],
        ];

        foreach ($blogs as $blogData) {
            \App\Models\Blog::create($blogData);
        }
    }
}
