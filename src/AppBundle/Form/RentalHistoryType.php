<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RentalHistoryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('client_name', null, array('label' => 'ФИО арендатора:'))->add('Car', null, array('label' => 'Автомобиль:'))->add('RentalPointStart', null, array('label' => 'Адрес проката, выдавшего авто:'))->add('date_start', null, array('label' => 'Дата выдачи:'))->add('RentalPointEnd', null, array('label' => 'Адрес проката, принявшего авто:'))->add('date_end', null,  array('label' => 'Дата приемки:'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\RentalHistory'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_rentalhistory';
    }


}
