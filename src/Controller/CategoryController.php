<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;

#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
         $category = $categoryRepository->findAll();
         return $this->render(
             'category/index.html.twig',

             ['category' => $category]
         );

    }

    #[Route('/{categoryName}', name: 'show')]

    public function show(string $categoryName, CategoryRepository $categoryRepository, ProgramRepository $programRepository): Response
    {
        $category = $categoryRepository->findOneBy(['name' => $categoryName]);
    
        if (!$category) {
            throw $this->createNotFoundException(
                'No category with name: ' . $categoryName . ' found in category\'s table.'
            );
        }
    
        $program = $programRepository->findBy(['category' => $category]);
    
        return $this->render('category/show.html.twig', [
            'category' => $category,
            'program' => $program,
        ]);
    } 
}