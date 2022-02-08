<?php

namespace Magexo\POS\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use \Magexo\POS\Model\PostFactory;
use Magento\Framework\App\ObjectManager;

class MagexoPosAdd extends Command
{

	protected $_postFactory;

	//Constants for POS parameters 
	//Name - string
	const NAME = 'name';
	//Address - string
	const ADDRESS = 'address';
	//Is available - string - yes = 1, no = 0
	const IS_AVAILABLE = 'is_available';

	protected function configure()
	{
		//Initializing input parameters
		$options = [
			new InputOption(
				self::NAME,
				null,
				InputOption::VALUE_REQUIRED,
				'Name'
			),
			new InputOption(
				self::ADDRESS,
				null,
				InputOption::VALUE_REQUIRED,
				'Address'
			), 
			new InputOption(
				self::IS_AVAILABLE,
				null,
				InputOption::VALUE_REQUIRED,
				'Is_available'
			)
		];

		//Setting CLI name
		$this->setName('magexo:pos:add')
			->setDescription('POS Add command line')
			->setDefinition($options);	

		parent::configure();
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		//If parameters are complete, create POS
		if ($name = $input->getOption(self::NAME) 
		and $address = $input->getOption(self::ADDRESS)
		and $is_available = $input->getOption(self::IS_AVAILABLE)) 
		{
			//Get instance of PostFactory - class for adding data to DB
			$this->_postFactory = ObjectManager::getInstance()->get(PostFactory::class);
            $post = $this->_postFactory->create();

			//Processing is_available replace string to number
			if($is_available == 'yes') $is_available_add = 1;
			elseif($is_available == 'no') $is_available_add = 0; 
			else $is_available_add = 0; 
			//Creating data for adding to DB
			$data = [
				'name' => $name,
				'address' => $address,
				'is_available' => $is_available_add
				];
			//Saving new POS to DB	
			$post->addData($data)->save();	
			$output->writeln("POS successfully created.");
     	} 
		else 
		{
			$output->writeln("Incomplete command, use: magexo:pos:add [--name NAME] [--address ADDRESS] [--is_available IS_AVAILABLE]");
		}
		return $this;
	}
}